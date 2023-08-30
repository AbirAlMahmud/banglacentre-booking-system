<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Dashboard;
use App\Models\HallManage;
use App\Models\SearchPage;
use App\Models\ShiftsModel;
use Illuminate\Http\Request;
use App\Models\BookingManage;
use App\Models\PaymentManage;
use App\Models\PersonalDetails;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Auth;



session_start();

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $booking_id = $request->query('booking');
        $booking = BookingManage::find($booking_id);
        return view('backend.payment', compact('booking'));
    }

    public function confirmpage()
    {
        return view('backend.confirmpage');
    }


    public function processPayment(Request $request)
    {
        Stripe::setApiKey("sk_test_51NhzgxDLuce6dgBfhkXakAQE1HR076sag7ejtqiJicLeOgiCYWsaLmEkeBN4z3J5WAJ8HKxIoEJOJ1zLrRZfBh2R00ohnZX3qZ");

        $user_id = Auth::id();

        $bookingmanage = BookingManage::where('user_id', $user_id)
        ->where('status', 'pending')
        ->latest() 
        ->first();

        Charge::create([
            'amount' => $bookingmanage->amount, // Amount in cents
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'description' => 'Hall Charge',
        ]);

        // Handle successful payment, redirect or show a success message

        
        if ($bookingmanage) {
            $payment = new PaymentManage();
            $payment->user_id = $user_id;
            $payment->hall_manage_id = $bookingmanage->hall_manage_id;
            $payment->booking_manage_id = $bookingmanage->id;
            $payment->payment_type = 'Stripe';
            $payment->status = 'Paid';
            $payment->save();

            $bookingmanage->status = 'Booked';
            $bookingmanage->save();
        } else {
            return 'fail insert in payment table';
        }
      

        return redirect()->route('confirmpage')->withMessage('Payment Successful');
    }






    public function processTransaction(Request $request)
    {
        $bookingmanage = BookingManage::find(2);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $bookingmanage->amount,
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('payment.index')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('payment.index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $user_id = Auth::id();

            $bookingmanage = BookingManage::where('user_id', $user_id)
            ->where('status', 'pending')
            ->latest() 
            ->first();
            if ($bookingmanage) {
                $payment = new PaymentManage();
                $payment->user_id = $user_id;
                $payment->hall_manage_id = $bookingmanage->hall_manage_id;
                $payment->booking_manage_id = $bookingmanage->id;
                $payment->payment_type = 'Stripe';
                $payment->status = 'Paid';
                $payment->save();
    
                $bookingmanage->status = 'Booked';
                $bookingmanage->save();
            } else {
                return 'fail insert in payment table';
            }
            return redirect()->route('confirmpage')->withMessage('Payment Successful');
        } else {
            return redirect()
                ->route('payment.index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('payment.index')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }


    
}
