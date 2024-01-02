<?php

namespace App\Http\Controllers;

use App\Models\Cycletime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CycletimeRequest;

class CycletimeController extends Controller
{
    public function cycletimeIndex()
    {
        $data = Cycletime::all();
        if($data->count() > 0){
            return response([
                'status' => 200,
                'info' => $data,
            ],200);
        } else {
            return response([
                'status' => 401,
                'error' => 'No data found in database',
            ],401);
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

            $output = DB::table('cycletimes')->update([
                'output_monday' =>  DB::raw(
                    '(SELECT output_monday FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
                'output_tuesday' =>  DB::raw(
                    '(SELECT output_tuesday FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
                'output_wednesday' =>  DB::raw(
                    '(SELECT output_wednesday FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
                'output_thursday' =>  DB::raw(
                    '(SELECT output_thursday FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
                'output_friday' =>  DB::raw(
                    '(SELECT output_friday FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
                'output_saturday' =>  DB::raw(
                    '(SELECT output_saturday FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
                'output_sunday' =>  DB::raw(
                    '(SELECT output_sunday FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
                'total_output' => DB::raw(
                    '(SELECT total_output FROM planning_requests WHERE planning_requests.id = cycletimes.id)'
                ),
            ]);
            DB::table('cycletimes')->update([
                'total_cycletime' => DB::raw('
                    cycletime_monday +
                    cycletime_tuesday +
                    cycletime_wednesday +
                    cycletime_thursday +
                    cycletime_friday +
                    cycletime_saturday +
                    cycletime_sunday
                '),
            ]);
            $average = DB::table('cycletimes')->update([
                'average_monday' => DB::raw('ROUND(cycletime_monday / output_monday, 2)'),
                'average_tuesday' =>DB::raw('ROUND(cycletime_tuesday / output_tuesday, 2)'),
                'average_wednesday' =>DB::raw('ROUND(cycletime_wednesday / output_wednesday, 2)'),
                'average_thursday' =>DB::raw('ROUND(cycletime_thursday / output_thursday, 2)'),
                'average_friday' =>DB::raw('ROUND(cycletime_friday / output_friday, 2)'),
                'average_saturday' =>DB::raw('ROUND(cycletime_saturday / output_saturday, 2)'),
                'average_sunday' =>DB::raw('ROUND(cycletime_sunday / output_sunday, 2)'),
            ]);
            return response([
                'status' => 200,
                'info' => $info,
            ],200);
        } else {
            return response([
                'status' => 401,
                'error' => 'Error in sending data to database',
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function cycletimeShow($id)
    {
        $data = Cycletime::find($id);
        if($data){
            return response([
                'status' => 200,
                'info' => $data,
            ],200);
        } else {
            return response([
                'status' => 401,
                'error' => 'No data found in database',
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function cycletimeEdit($id)
    {
        $data = Cycletime::find($id);
        if($data){
            return response([
                'status' => 200,
                'info' => $data,
            ],200);
        } else {
            return response([
                'status' => 401,
                'error' => 'No data found in database',
            ], 401);
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
            return response([
                'status' => 200,
                'info' => $info,
            ],200);
        } else {
            return response([
                'status' => 401,
                'error' => 'Error in sending data to database'
            ], 401);
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
            return response([
                'status' => 200,
                'message' => 'Successfully removed the data from database',
            ], 200);
        } else {
            return response([
                'status' => 401,
                'error' => 'Unsuccessfully delete in database',
            ], 401);
        }
    }
}
