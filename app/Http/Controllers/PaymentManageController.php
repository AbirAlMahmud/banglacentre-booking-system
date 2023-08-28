<?php

namespace App\Http\Controllers;

use App\Models\PaymentManage;
use Illuminate\Http\Request;

class PaymentManageController extends Controller
{
    public function index(){
        $paymentmanages = PaymentManage::all();
        return view('backend.payments.index', compact('paymentmanages'));
    }
}
