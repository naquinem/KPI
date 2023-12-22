<?php

namespace App\Http\Controllers;

use App\Models\Cycletime;
use Illuminate\Http\Request;
use App\Http\Requests\CycletimeRequest;

class CycletimeController extends Controller
{
    public function cycletimeIndex()
    {
        $data = Cycletime::all();
        if($data->count() > 0){
            return response()->json([
                'status' => 200,
                'info' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No data found in database',
            ],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function cycletimeStore(CycletimeRequest $request)
    {
        $data = $request->validated();
        $info = Cycletime::create([
            'workweek' => $data['workweek'],
            'cycletime_monday' => $data['cycletime_monday'],
            'cycletime_tuesday' => $data['cycletime_tuesday'],
            'cycletime_wednesday' => $data['cycletime_wednesday'],
            'cycletime_thursday' => $data['cycletime_thursday'],
            'cycletime_friday' => $data['cycletime_friday'],
            'cycletime_saturday' => $data['cycletime_saturday'],
            'cycletime_sunday' => $data['cycletime_sunday'],
        ]);
        if($info){
            return response()->json([
                'status' => 200,
                'info' => $info,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Error in sending data to database',
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function cycletimeShow($id)
    {
        $data = Cycletime::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'info' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No data found in database',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cycletimeEdit($id)
    {
        $data = Cycletime::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'info' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No data found in database',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function cycletimeUpdate(CycletimeRequest $request, int $id)
    {
        $data = $request->validated();
        $info = Cycletime::find($id);
        if($info){
            $info->update([
                'workweek' => $data['workweek'],
                'cycletime_monday' => $data['cycletime_monday'],
                'cycletime_tuesday' => $data['cycletime_tuesday'],
                'cycletime_wednesday' => $data['cycletime_wednesday'],
                'cycletime_thursday' => $data['cycletime_thursday'],
                'cycletime_friday' => $data['cycletime_friday'],
                'cycletime_saturday' => $data['cycletime_saturday'],
                'cycletime_sunday' => $data['cycletime_sunday'],
            ]);
            return response()->json([
                'status' => 200,
                'info' => $info,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Error in sending data to database'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cycletimeDestroy($id)
    {
        $data = Cycletime::find($id);
        if($data) {
            $data->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully removed the data from database',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Unsuccessfully delete in database',
            ]);
        }
    }
}
