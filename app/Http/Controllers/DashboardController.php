<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use Illuminate\Support\Facades\Session;

session_start();

class DashboardController extends Controller
{
    public function index()
    {
        $dashboards = Session::get('dashboards');
        return view('backend.dashboard2', compact('dashboards'));
    }

    public function edit($id)
    {
        $dashboard = Dashboard::find($id);
        return view('backend.dashboards.edit', compact('dashboard'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token');
            if($request->hasFile('image')){
                $previousImage = Dashboard::find($id)->image;
                $this->unlink($previousImage);
                $data['image'] = $this->uploadImage($request->image);
            }
            Dashboard::where('id',$id)->update($data);
            return redirect()->route('admin.index')->withMessage('Booking Updated');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/searchpage/';
        if($file != '' && file_exists($pathToUpload.$file)){
            @unlink($pathToUpload.$file);
        }
    }

    public function destroy($id)
    {
        try{
            $dashboard = Dashboard::find($id);
            $dashboard->delete();
            return redirect()->route('admin.index')->withMessage('Booking Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        $dashboard = Dashboard::find($id);
        return view('backend.dashboards.show',compact('dashboard'));
    }
}
