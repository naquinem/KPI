<?php

namespace App\Http\Controllers;

use App\Models\Headcount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HeadcountRequest;

class HeadcountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function headcountIndex()
    {
        $data = Headcount::all();
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
    public function headcountStore(HeadcountRequest $request)
    {
        $data = $request->validated();
        $info = Headcount::create([
            'total_headcounts' => $data['total_headcounts'],
        ]);
        if($info){
            DB::table('headcounts')->update([
                'workweek' => DB::raw(
                    '(SELECT workweek FROM planning_requests WHERE planning_requests.id = headcounts.id)'
                ),
                'total_output' => DB::raw(
                    '(SELECT total_output FROM planning_requests WHERE planning_requests.id = headcounts.id)'
                ),
                'repair_output_per_head' => DB::raw(
                    'ROUND(total_output / total_headcounts, 2)'
                ),
            ]);
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
    public function headcountShow($id)
    {
        $data = Headcount::find($id);
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
    public function headcountEdit($id)
    {
        $data = Headcount::find($id);
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
    public function headcountUpdate(HeadcountRequest $request, int $id)
    {
        $data = $request->validated();
        $info = Headcount::find($id);
        if($info){
            $info->update([
                'total_headcounts' => $data['total_headcounts'],
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
    public function headcountDestroy($id)
    {
        $data = Headcount::find($id);
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
