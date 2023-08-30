<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Models\BookingManage;

class UpdateBookedStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $bookingmanage;

    /**
     * Create a new job instance.
     */
    public function __construct($bookingmanage)
    {
        $this->bookingmanage = $bookingmanage;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $bookingmanage = $this->bookingmanage;
        $currentDateTime = now();

        // Check if the current date is within the check-in and check-out range
        if (
            $currentDateTime->gte($bookingmanage->check_in_date) &&
            $currentDateTime->lte($bookingmanage->check_out_date)
        ) {
            // Get the in-time and out-time for the shift
            $inTime = Carbon::parse($bookingmanage->shifts_model->in_time);
            $outTime = Carbon::parse($bookingmanage->shifts_model->out_time);

            // Check if the current time is within the in-time and out-time of the shift
            if (
                $currentDateTime->format('H:i') >= $inTime->format('H:i') &&
                $currentDateTime->format('H:i') <= $outTime->format('H:i')
            ) {
                $bookingmanage->status = 'Booked';
            } else {
                $bookingmanage->status = 'Available';
            }
        } else {
            $bookingmanage->status = 'Available';
        }

        $bookingmanage->save();
    }

}
