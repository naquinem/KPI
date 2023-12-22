<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use App\Http\Requests\CrudRequest;

class CrudController extends Controller
{
    public function index()
    {
        $data = Crud::all();
        if($data->count() > 0){
            return response()->json([
                'status' => 200,
                'data' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No data found in database',
            ],404);
        }
    }
    public function store(CrudRequest $request)
    {
        $data = $request->validated();
        $user = Crud::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'contact_number' => $data['contact_number'],
            'age' => $data['age'],
            'birth_date' => $data['birth_date'],
            'address' => $data['address'],
        ]);
        if($user){
            return response()->json([
                'status' => 200,
                'user' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Error in sending data to database',
            ], 404);
        }
    }
    public function show($id)
    {
        $data = Crud::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'data' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No data found in database',
            ]);
        }

    }
    public function edit($id)
    {
        $data = Crud::find($id);
        if($data){
            return response()->json([
                'status' => 200,
                'data' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'No data found in database',
            ]);
        }

    }
    public function managed(CrudRequest $request, int $id)
    {
        $data = $request->validated();
        $user = Crud::find($id);
        if($user){
            $user->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'contact_number' => $data['contact_number'],
                'age' => $data['age'],
                'birth_date' => $data['birth_date'],
                'address' => $data['address'],
            ]);
            return response()->json([
                'status' => 200,
                'user' => $data,
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Error in sending data to database'
            ], 404);
        }
    }
    public function removed($id)
    {
        $data = Crud::find($id);
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
