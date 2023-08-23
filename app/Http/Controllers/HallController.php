<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class HallController extends Controller
{
    public function index()
    {
        $hall = Hall::all();

        return view('backend.hall.index', compact('hall'));
    }

    public function create()
    {
        return view('backend.hall.create');
    }

    public function store(Request $request)
    {
        try {
        $hall = new Hall();

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $path = public_path('uploads/images');
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $uploadedFile->move($path, $fileName);
            $hall->image=  $fileName ;

        }
        $hall->hall_name = $request->input('hall_name');
        $hall->description = $request->input('description');
        $hall->price = $request->input('price');
        $hall->discount_percentage = $request->input('discount_percentage');
        $hall->status = 'available';
        $hall->save();
            return redirect()->route('hall.index')->withMessage('Hall Added');
        } 
        catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $hall = Hall::find($id);
        return view('backend.hall.edit', compact('hall'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image type and size
                'hall_name' => 'required|string|max:255',
                'price' => 'required|max:255',
                'discount_percentage' => 'required|max:255',
            ]);
            $hall = Hall::findOrFail($id);
            if ($request->has('delete_image')) {
                // Delete the old image if it exists
                File::delete(public_path('uploads/images/' . $hall->image));
                $hall->image = null; // Set the image field to null
            }
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                File::delete(public_path('uploads/images/' . $hall->image));
                $uploadedFile = $request->file('image');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $path = public_path('uploads/images');
                $uploadedFile->move($path, $fileName);
        
                $hall->image=  $fileName ;
        
            }
            $hall->hall_name = $request->input('hall_name');
            $hall->price = $request->input('price');
            $hall->discount_percentage = $request->input('discount_percentage');
            $hall->description = $request->input('description');
            $hall->save();
            return redirect()->route('hall.index')->withMessage('Hall Updated');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $hall = Hall::find($id);
            $hall->status = 'off';
            $hall->save();
            return redirect()->route('hall.index')->withMessage('Hall Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function uploadImage($file)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $file_name = $timestamp . '.' . $file->getClientOriginalExtension();

        $pathToUpload = storage_path() . '/app/public/searchpage/';

        if (!is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0755, true);
        }

        Image::make($file)->resize(634, 792)->save($pathToUpload . $file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/searchpage/';
        if($file != '' && file_exists($pathToUpload.$file)){
            @unlink($pathToUpload.$file);
        }
    }
}
