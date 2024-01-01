<?php

namespace App\Http\Controllers;

use App\Models\Overtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function overtimeStore(OvertimeRequest $request)
    {
        $data = $request->validated();
        $info = Overtime::create([
            'total_work_hours' => $data['total_work_hours'],
            'total_regular_hours' => $data['total_regular_hours'],
        ]);
        if($info){
            DB::table('overtimes')->update([
                'workweek' => DB::raw(
                    '(SELECT workweek FROM planning_requests WHERE planning_requests.id = overtimes.id)'
                ),
                'total_overtime' => DB::raw(
                    'ROUND(total_work_hours - total_regular_hours, 2)'
                ),
                'total_headcounts' => DB::raw(
                    '(SELECT total_headcounts FROM headcounts WHERE headcounts.id = overtimes.id)'
                ),
                'average_overtime' => DB::raw(
                    'ROUND(total_overtime / total_work_hours * 100, 2)'
                ),
            ]);

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
