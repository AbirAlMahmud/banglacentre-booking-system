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
        $hall_name = $request->input('hall_name');
        $period = $request->input('time_period');
        $charity = $request->input('charity');
        $start_time = null;
        $end_times = null;
    
        // If period is 'Custom', set start_time and end_time
        if ($period === 'Custom') {
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');
        }

        $query = Hall::where('status', 'available')
        ->where('hall_name', 'like', '%' . $hall_name . '%')
        ->when($charity, function ($query) use ($charity) {
            return $query->where('charity_discount', '>=', $charity);
        })
        ->when($check_in_date && $check_out_date, function ($query) use ($check_in_date, $check_out_date) {
            return $query->where(function ($subQuery) use ($check_in_date, $check_out_date) {
                $subQuery->where(function ($dateQuery) use ($check_in_date, $check_out_date) {
                    $dateQuery->whereBetween('check_in_datetime', [$check_in_date, $check_out_date])
                        ->orWhereBetween('check_out_datetime', [$check_in_date, $check_out_date]);
                });
                if ($start_time && $end_times) {
                    $subQuery->orWhere(function ($timeQuery) use ($check_in_date, $start_time, $end_time) {
                        $timeQuery->whereDate('check_in_datetime', $check_in_date)
                            ->whereTime('check_in_datetime', '>=', $start_time)
                            ->whereTime('check_in_datetime', '<=', $end_time);
                    });
                }
            });
        })
        ->get();


        return view('your.view.name', ['results' => $results]);
    }

}
