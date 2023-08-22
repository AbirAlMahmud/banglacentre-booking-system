<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use App\Http\Requests\PersonalDetailsRequest;

class PersonalDetailsController extends Controller
{
    public function create()
    {
        return view('backend.personaldetails.create');
    }

    public function store(PersonalDetailsRequest $request)
    {
        try {
            PersonalDetails::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'comment' => $request->comment,
            ]);
            return redirect()->route('person.index')->withMessage('Person Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
