<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Dashboard;
use App\Models\SearchPage;
use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

session_start();

class PaymentController extends Controller
{
    public function index()
    {
        return view('backend.payment');
    }

    public function confirmpage()
    {
        return view('backend.confirmpage');
    }


    public function processPayment(Request $request)
    {
        Stripe::setApiKey("sk_test_51NhzgxDLuce6dgBfhkXakAQE1HR076sag7ejtqiJicLeOgiCYWsaLmEkeBN4z3J5WAJ8HKxIoEJOJ1zLrRZfBh2R00ohnZX3qZ");

        $charge = Charge::create([
            'amount' => 1000, // Amount in cents
            'currency' => 'gbp',
            'source' => $request->stripeToken,
            'description' => 'Example Charge',
        ]);

        // Handle successful payment, redirect or show a success message

        return redirect()->route('confirmpage')->withMessage('Payment Successful');
    }






    public function processTransaction(Request $request)
    {
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
                        "currency_code" => "GBP",
                        "value" => 1000,
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
