<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HallManage;
use Illuminate\Http\Request;
use App\Models\PaymentManage;
use Illuminate\Support\Facades\Auth;

session_start();

class UserDashboardController extends Controller
{
    public function user_dashboard()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $paymentmanages = PaymentManage::where('user_id', $userId)->get();

            $hallManages = HallManage::latest()->get();
            $users = User::latest()->get();

            return view('dashboard', compact('paymentmanages', 'hallManages', 'users'));
        }
    }
}
