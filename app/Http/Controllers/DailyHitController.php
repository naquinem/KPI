<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\DailyResource;
use App\Http\Requests\DailyHitRequest;

class DailyHitController extends Controller
{
    public function dailyIndex()
    {
        $data = Daily::all();
        if($data->count() > 0){
            return response([
                'status' => 200,
                'info' => $data,
            ],200);
        } else {
            return response([
                'status' => 401,
                'message' => 'No data found in database',
            ],401);
        }
    }
    public function dailyStore(DailyHitRequest $request)
    {
        $data = $request->validated();
        $info = Daily::create([
            'workweek' => $data['workweek']
        ]);
        if($info){
            DB::table('dailies')->update([
                'planning_monday' => DB::raw(
                    '(SELECT planning_monday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'planning_tuesday' => DB::raw(
                    '(SELECT planning_tuesday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'planning_wednesday' => DB::raw(
                    '(SELECT planning_wednesday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'planning_thursday' => DB::raw(
                    '(SELECT planning_thursday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'planning_friday' => DB::raw(
                    '(SELECT planning_friday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'planning_saturday' => DB::raw(
                    '(SELECT planning_saturday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'planning_sunday' => DB::raw(
                    '(SELECT planning_sunday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'output_monday' => DB::raw(
                    '(SELECT output_monday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'output_tuesday' => DB::raw(
                    '(SELECT output_tuesday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'output_wednesday' => DB::raw(
                    '(SELECT output_wednesday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'output_thursday' => DB::raw(
                    '(SELECT output_thursday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'output_friday' => DB::raw(
                    '(SELECT output_friday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'output_saturday' => DB::raw(
                    '(SELECT output_saturday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),
                'output_sunday' => DB::raw(
                    '(SELECT output_sunday FROM planning_requests WHERE planning_requests.id = dailies.id)'
                ),

            ]);
            DB::table('dailies')->update([
                'percentage_monday' => DB::raw('ROUND(output_monday / planning_monday, 2)'),
                'percentage_tuesday' => DB::raw('ROUND(output_tuesday / planning_tuesday, 2)'),
                'percentage_wednesday' => DB::raw('ROUND(output_wednesday / planning_wednesday, 2)'),
                'percentage_thursday' => DB::raw('ROUND(output_thursday / planning_thursday, 2)'),
                'percentage_friday' => DB::raw('ROUND(output_friday / planning_friday, 2)'),
                'percentage_saturday' => DB::raw('ROUND(output_saturday / planning_saturday, 2)'),
                'percentage_sunday' => DB::raw('ROUND(output_sunday / planning_sunday, 2)'),
            ]);
            DB::table('dailies')->update([
                'total_percentage' => DB::raw('
                    ROUND(percentage_monday +
                    percentage_tuesday +
                    percentage_wednesday +
                    percentage_thursday +
                    percentage_friday +
                    percentage_saturday +
                    percentage_sunday, 2)
                '),
            ]);

            return response([
                'status' => 200,
                'data' => $info,
            ], 200);
        } else {
            return response([
                'status' => 401,
                'error' => 'Error in sending data to database'
            ], 401);
        }
    }
}
