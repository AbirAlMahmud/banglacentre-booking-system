<?php

namespace App\Http\Controllers;
use Exception;

use App\Models\BookingManage;
use Illuminate\Http\Request;

class BookingManageController extends Controller
{
    public function index()
    {
        $bookings = BookingManage::latest()->get();
        return view('backend.bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('backend.bookings.create');
    }

    public function store(Request $request)
    {
        try {
            $booking = new BookingManage();
            $booking->user_id = '1';
            $booking->hall_manage_id = $request->hall_manage_id;
            $booking->check_in_date = $request->input('check_in_date');
            $booking->check_out_date = $request->input('check_out_date');
            $booking->amount = $request->input('amount');
            $booking->organization_type = $request->input('organization_type');
            $booking->booking_date = now();
            $booking->shifts_model_id = $request->input('shifts_model_id');
            $booking->status = 'pending';
            $booking->save();
            return redirect()->route('booking.index')->withMessage('Booking is Pending, Pelase Payment in 1hour for confirmation');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
    

    public function edit($id)
    {
        $booking = BookingManage::find($id);
        return view('backend.bookibngs.edit', compact('booking'));
    }

    public function update(Request $request, $id)
{
    try {
      
        $booking = BookingManage::findOrFail($id);
        $booking->user_id = '1';
        $booking->hall_manage_id = $request->hall_manage_id;
        $booking->check_in_date = $request->input('check_in_date');
        $booking->check_out_date = $request->input('check_out_date');
        $booking->amount = $request->input('amount');
        $booking->organization_type = $request->input('organization_type');
        $booking->booking_date = now();
        $booking->shifts_model_id = $request->input('shifts_model_id');
        $booking->status = 'pending';
        $booking->save();

        return redirect()->route('shift.index')->withMessage('Shift Updated');
    } catch (\Exception $e) {
        return redirect()->back()->withError($e->getMessage());
    }
}


    public function destroy($id)
    {
        try{
            $booking = BookingManage::findOrFail($id);
            $booking->forceDelete();
            return redirect()->route('booking.index')->withMessage('Booking Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
