<?php

namespace App\Http\Controllers;

use App\Models\Overtime;
use Illuminate\Http\Request;
use App\Http\Requests\OvertimeRequest;
use App\Http\Resources\OvertimeResource;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function overtimeIndex()
    {
        $data = Overtime::all();
        if($data->count() > 0){
            return response()->json([
                'status' => 200,
                'info' => new OvertimeResource($data),
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
    public function overtimeStore(OvertimeRequest $request)
    {
        $data = $request->validated();
        $info = Overtime::create([
            'workweek' => $data['workweek'],
            'total_hours' => $data['total_hours'],
            'regular_hours' => $data['regular_hours'],
        ]);
        if($info){
            return response()->json([
                'status' => 200,
                'info' => new OvertimeResource($info),
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
    public function overtimeShow($id)
    {
        $data = Overtime::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'info' => new OvertimeResource($data),
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
    public function overtimeEdit($id)
    {
        $data = Overtime::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'info' => new OvertimeResource($data),
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
    public function overtimeUpdate(OvertimeRequest $request, int $id)
    {
        $data = $request->validated();
        $info = Overtime::find($id);
        if($info){
            $info->update([
                'workweek' => $data['workweek'],
                'total_hours' => $data['total_hours'],
                'regular_hours' => $data['regular_hours'],
            ]);
            return response()->json([
                'status' => 200,
                'info' => new OvertimeResource($info),
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
    public function overtimeDestroy($id)
    {
        $data = Overtime::find($id);
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
