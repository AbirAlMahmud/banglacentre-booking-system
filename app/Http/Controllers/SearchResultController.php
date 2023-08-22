<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\SearchPage;
use Illuminate\Http\Request;
use App\Http\Requests\FindHallRequest;

class SearchResultController extends Controller
{
    public function index(FindHallRequest $request)
    {
        $check_in_date = $request->input('check_in_date');
        $check_out_date = $request->input('check_out_date');
        $hall = $request->input('hall');
        $period = $request->input('period');
        $charity = $request->input('charity');


        $query = SearchPage::query();

        try {
            if ($check_in_date && $check_out_date && $hall && $period && $charity) {
                $query->where('check_in_date', 'like', '%' . $check_in_date . '%');
                $query->where('check_out_date', 'like', '%' . $check_out_date . '%');
                $query->where('hall', 'like', '%' . $hall . '%');
                $query->where('period', 'like', '%' . $period . '%');
                $query->where('booking_type', 'like', '%' . $charity . '%');
            }
            $searchpages = $query->get();

            return view('backend.searchresult', compact('searchpages'));

        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
