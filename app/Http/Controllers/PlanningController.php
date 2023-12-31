<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlanningRequest;

class PlanningController extends Controller
{
    public function planningIndex()
    {
        $data = Planning::all();
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
    public function planningStore(PlanningRequest $request)
    {
        $data = $request->validated();
        $info = Planning::create([
            'workweek' => $data['workweek'],
            'planning_monday' => $data['planning_monday'],
            'planning_tuesday' => $data['planning_tuesday'],
            'planning_wednesday' => $data['planning_wednesday'],
            'planning_thursday' => $data['planning_thursday'],
            'planning_friday' => $data['planning_friday'],
            'planning_saturday' => $data['planning_saturday'],
            'planning_sunday' => $data['planning_sunday'],
            'output_monday' => $data['output_monday'],
            'output_tuesday' => $data['output_tuesday'],
            'output_wednesday' => $data['output_wednesday'],
            'output_thursday' => $data['output_thursday'],
            'output_friday' => $data['output_friday'],
            'output_saturday' => $data['output_saturday'],
            'output_sunday' => $data['output_sunday'],
        ]);

        if($info){
            DB::table('planning_requests')->update(['total_request' => DB::raw('planning_monday+planning_tuesday+planning_wednesday+planning_thursday+planning_friday+planning_saturday+planning_sunday')]);
            DB::table('planning_requests')->update(['total_output' => DB::raw('output_monday+output_tuesday+output_wednesday+output_thursday+output_friday+output_saturday+output_sunday')]);

            return response()->json([
                'status' => 200,
                'info' => $info,
            ],200);
        } else {
            return response()->json([
                'status' => 401,
                'error' => 'Error in sending data to database',
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function planningShow($id)
    {
        $data = Planning::find($id);
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
    public function planningEdit($id)
    {
        $data = Planning::find($id);
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
    public function planningUpdate(PlanningRequest $request, int $id)
    {
        $data = $request->validated();
        $info = Planning::find($id);
        if($info){
            $info->update([
                'workweek' => $data['workweek'],
                'planning_monday' => $data['planning_monday'],
                'planning_tuesday' => $data['planning_tuesday'],
                'planning_wednesday' => $data['planning_wednesday'],
                'planning_thursday' => $data['planning_thursday'],
                'planning_friday' => $data['planning_friday'],
                'planning_saturday' => $data['planning_saturday'],
                'planning_sunday' => $data['planning_sunday'],
                'output_monday' => $data['output_monday'],
                'output_tuesday' => $data['output_tuesday'],
                'output_wednesday' => $data['output_wednesday'],
                'output_thursday' => $data['output_thursday'],
                'output_friday' => $data['output_friday'],
                'output_saturday' => $data['output_saturday'],
                'output_sunday' => $data['output_sunday'],
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
    public function planningDestroy($id)
    {
        $data = Planning::find($id);
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
