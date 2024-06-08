<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Field;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::orderBy('created_at', 'desc')->get();
        $timeslots = TimeSlot::orderBy('start_time', 'asc')->get();
        return view('admin.fields.index',  compact('fields', 'timeslots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fields.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFieldRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // upload process here
        $path = public_path('app/public/assets/upload-field');
        if (!File::isDirectory($path)) {
            Storage::makeDirectory('public/assets/upload-field');
        }
        // change file locations
        if (isset($data['image'])) {
            $data['image'] = $request->file('image')->store(
                'assets/upload-field',
                'public'
            );
        } else {
            $data['image'] = "";
        }

        // store to database
        Field::create($data);

        return redirect()->route('admin.field')->with('success', 'successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        return view('admin.fields.edit',  compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFieldRequest $request, Field $field)
    {
        // get all request from frontsite
        $data = $request->all();

        if (isset($data['image'])) {

            // first checking old photo to delete from storage
            $get_item = $field['image'];

            // change file locations
            $data['image'] = $request->file('image')->store(
                'assets/upload-field',
                'public'
            );

            // delete old photo from storage
            $data_old = 'storage/' . $get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            } else {
                File::delete('storage/app/public/' . $get_item);
            }
        }

        // update to database
        $field->update($data);
        return redirect()->route('admin.field')->with('success', 'successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        // first checking old file to delete from storage
        $get_item = $field['image'];

        $data = 'storage/' . $get_item;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_item);
        }

        $field->delete();

        // alert()->success('Success Message', 'Successfully deleted doctor');
        return back()->with('success', 'successfully');
    }
}
