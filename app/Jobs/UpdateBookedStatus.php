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

        $customCheckInDate = Carbon::create(2023, 8, 31, 12, 45); // Replace with your desired check-in date and time
        $customCheckOutDate = Carbon::create(2023, 8, 31, 12, 47); // Replace with your desired check-out date and time

        // Check if the current date is within the custom check-in and check-out range
        if (
            $currentDateTime->gte($customCheckInDate) &&
            $currentDateTime->lte($customCheckOutDate)
        ) {
            // Get the in-time and out-time for the shift
            $inTime = Carbon::create(2023, 8, 31, 12, 50); // Replace with your desired in-time
            $outTime = Carbon::create(2023, 8, 31, 12, 52); // Replace with your desired out-time

            // Check if the current time is within the custom in-time and out-time of the shift
            if (
                $currentDateTime->format('H:i') >= $inTime->format('H:i') &&
                $currentDateTime->format('H:i') <= $outTime->format('H:i')
            ) {
                $bookingmanage->status = 'Booked1';
            } else {
                $bookingmanage->status = 'available1';
            }
        } else {
            $bookingmanage->status = 'available2';
        }
        $bookingmanage->save();
    }
}
