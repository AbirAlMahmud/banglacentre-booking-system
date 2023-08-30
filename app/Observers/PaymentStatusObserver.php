<?php

namespace App\Observers;
use App\Models\ShiftsModel;

use App\Models\PaymentManage;
use Carbon\Carbon;


class PaymentStatusObserver
{
    /**
     * Handle the PaymentManage "created" event.
     */
    public function created(PaymentManage $paymentManage): void
    {
        //
    }

    /**
     * Handle the PaymentManage "updated" event.
     */
    public function updated(PaymentManage $payment)
    {
        if ($payment->isDirty('status') && $payment->status === 'Paid') {
            $bookingmanage = $payment->bookingmanage;
            if ($bookingmanage) {
                $currentDate = now();
                $checkInDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $bookingmanage->check_in_date . ' ' . $bookingmanage->shifts->in_time);
                $checkOutDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $bookingmanage->check_out_date . ' ' . $bookingmanage->shifts->out_time);
                
                if ($currentDate >= $checkInDateTime && $currentDate <= $checkOutDateTime) {
                    $bookingmanage->status = 'Booked';
                } else {
                    $bookingmanage->status = 'Available';
                }
                $bookingmanage->save();
            }
        }
    }

    /**
     * Handle the PaymentManage "deleted" event.
     */
    public function deleted(PaymentManage $paymentManage): void
    {
        //
    }

    /**
     * Handle the PaymentManage "restored" event.
     */
    public function restored(PaymentManage $paymentManage): void
    {
        //
    }

    /**
     * Handle the PaymentManage "force deleted" event.
     */
    public function forceDeleted(PaymentManage $paymentManage): void
    {
        //
    }
}
