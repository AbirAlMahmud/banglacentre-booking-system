<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use App\Http\Requests\PersonalDetailsRequest;

class PersonalDetailsController extends Controller
{
    public function index()
    {
        $personaldetails = PersonalDetails::all();

        return view('backend.personaldetails.index', compact('personaldetails'));
    }

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
            return redirect()->route('payment.index');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $personaldetail = PersonalDetails::find($id);
        return view('backend.personaldetails.edit', compact('personaldetail'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token');
            PersonalDetails::where('id',$id)->update($data);
            return redirect()->route('person.index')->withMessage('Personal Details Updated');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $personaldetail = PersonalDetails::find($id);
            $personaldetail->delete();
            return redirect()->route('person.index')->withMessage('Personal Details Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
