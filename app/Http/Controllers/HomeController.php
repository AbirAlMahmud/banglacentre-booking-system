<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $halls = Hall::where('status', '!=', 'off')->get();
        return view('backend.home', compact('halls'));
    }

    public function hallSearch(Request $request)
    {
        $check_in_date = $request->input('check_in_date');
        $check_out_date = $request->input('check_out_date');
        $hall = $request->input('hall_name');
        $period = $request->input('time_period');
        $charity = $request->input('charity');
        $start_time = null;
        $end_time = null;

        // If period is 'Custom', set start_time and end_time
        if ($period === 'Custom') {
            $start_time = $request->input('start_time'); 
            $end_time = $request->input('end_time'); 
        }

        $query = Hall::query();

        $query->where('status', 'available')
            ->where(function ($q) use ($check_in_date, $check_out_date) {
                $q->where('check_in_date', '<=', $check_in_date)
                    ->where('check_out_date', '>=', $check_out_date);
            });

        $results = $query->get();
        // Add filters based on the provided data
        $query->where('hall_name', $hall);

        if ($charity === 'Charity') {
            $query->where('has_discount', true);
        }
        if ($period === 'FullDay') {
            // If the period is 'FullDay', check status
            $query->where('status', 'active');
        } elseif ($period === 'Custom') {
            // If the period is 'Custom', check status and time range
            $query->where('status', 'active')
                ->where('start_time', '<=', $start_time)
                ->where('end_time', '>=', $end_time);
        }

        // Execute the query
        $results = $query->get();

        // Now, $results contains the halls that match the specified criteria

        return view('your.view.name', ['results' => $results]);
    }

}
