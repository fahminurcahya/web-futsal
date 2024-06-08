<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeslots = TimeSlot::orderBy('start_time', 'asc')->get();
        return view('admin.timeslot.index',  compact('timeslots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeSlot $timeSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeSlot $timeSlot)
    {
        $timeSlot->is_active = !$timeSlot->is_active;
        $timeSlot->save();

        return response()->json(['success' => true, 'message' => 'updated successfully.']);
    }
}
