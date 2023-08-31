<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\HallManage;
use App\Models\ShiftsModel;
use Illuminate\Http\Request;
use App\Models\BookingManage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchPageRequest;
use Illuminate\Support\Facades\Session;
use App\Jobs\UpdatePendingStatus;

use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\UpdateBookingStatus;



class HomeController extends Controller
{


    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Update the status of pending bookings created 1 minute ago
            BookingManage::where('status', 'pending')
                ->where('created_at', '<=', now()->subHour())
                ->update(['status' => 'available']);
        })->everyMinute();
    }
    public function index()
    {
        $halls = HallManage::latest()->get();
        $shifts = ShiftsModel::latest()->get();
        return view('backend.dashboard', compact('halls', 'shifts'));
    }
    public function searchresult()
    {
        $halls = HallManage::latest()->get();
        $shifts = ShiftsModel::latest()->get();
        return view('backend.searchresult', compact('halls', 'shifts'));
    }

    public function hallSearch(SearchPageRequest $request)
    {
       $charity = $request->input('shifts_model_id');
            $charity = $request->input('charity');
            $selected_Shift = ShiftsModel::findOrFail( $request->input('shift'));
            // Calculate the duration in hours
            $in_Time = new \DateTime($selected_Shift->in_time);
            $out_Time = new \DateTime($selected_Shift->out_time);
            $query = BookingManage::join('shifts_models', 'booking_manages.shifts_model_id', '=', 'shifts_models.id')
                ->where('booking_manages.check_in_date', '<=', $request->input('check_out_date'))
                ->where('booking_manages.check_out_date', '>=', $request->input('check_in_date'))
                ->where('shifts_models.id', $request->input('shift'));

            if ($request->hall != 0) {
                $query->where('booking_manages.hall_manage_id', $request->hall);

            }
            $existingBooking = $query->get();

            $bookingCount = $existingBooking->count();

            $check_in_date_view=$request->check_in_date;
            $check_out_date_view=$request->check_out_date;
            $shift_view=$request->shift;

            $checkInDate = new \DateTime($request->check_in_date);
            $checkOutDate = new \DateTime($request->check_out_date);
            $numberOfDays = $checkInDate->diff($checkOutDate)->days;
            $numberOfDays = $numberOfDays + 1 ;

            if ($bookingCount == 0) {
                if ($request->hall == 0) {
                    $allHallInfo = HallManage::all();
                    $discount_prices = []; // Array to store discount prices

                    foreach ($allHallInfo as $hall) {
                        if ($charity == 1) {
                            $discount_price = ($hall->price - ($hall->price * $hall->charity_discount) / 100);
                        } else {
                            $discount_price = $hall->price ; ; // No discount
                        }

                        $discount_prices[$hall->id] = $discount_price; // Store discount price for each hall
                    }

                    return view('backend.halllist', compact('allHallInfo', 'discount_prices', 'charity','numberOfDays','check_in_date_view','check_out_date_view','shift_view'));

                    } else {
                        if ($charity == 1) {
                            $hallInfo = HallManage::find($request->hall);
                            $discount_price = ($hallInfo->price - ($hallInfo->price * $hallInfo->charity_discount) / 100);
                        } else {
                            $hallInfo = HallManage::find($request->hall);
                            $discount_price = $hallInfo->price;
                        }

                        return view('backend.halllist', compact('hallInfo', 'discount_price','numberOfDays','charity','check_in_date_view','check_out_date_view','shift_view'));

                    }
            } else {

                return redirect()->back()->with('message', 'In this date and shift hall not available !!');

            }
        }


    public function store(Request $request)
    {
        $halllist_id = Session::get('halllist_id');
        $halllist_price = Session::get('halllist_price');
        try {

            $booking = new BookingManage();
            $booking->user_id = Auth::user()->id;
            $booking->hall_manage_id = $halllist_id;
            $booking->amount = $halllist_price;

            $booking->check_in_date = $request->input('check_in_date');
            $booking->check_out_date = $request->input('check_out_date');
            $booking->organization_type = ($request->input('charity') == 1) ? 'charity' : 'non-charity';
            $booking->shifts_model_id = $request->input('shifts_model_id');
            $booking->booking_date = now();
            $booking->status = 'pending';

            $booking->save();
            UpdatePendingStatus::dispatch($booking)->delay(now()->addSeconds(60));

            return redirect()->route('payment.index', ['booking' => $booking])->withMessage('Booking is Pending, Please Payment in 1 hour for confirmation');

        } catch (Exception $e) {
            return redirect()->back()->withError('k');
        }
        session_destroy();
    }

    public function halldetails($id1,$id2){
        if($id1){
            $hallmanage = HallManage::find($id1);
            return view('backend.halldetails', compact('hallmanage'));
        }else{
            $hallmanage = HallManage::find($id2);
            return view('backend.halldetails', compact('hallmanage'));
        }
    }
}
