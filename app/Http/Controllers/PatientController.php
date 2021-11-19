<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index(){
        $patient = Patients::all();

        if ($patient->isNotEmpty()) {

            $data = [
                'message' => 'Get All Resource',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
            ];

            return response()->json($data, 200);
        }
    }
    public function store(Request $request)
    {
        $input = [
            'name' =>  $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at
        ];

        $patient = Patients::create($input);

        if ($patient) {

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found',
            ];

            return response()->json($data, 404);
        }
 
    }

    public function update(Request $request, $id)
    {
        $patient = Patients::find($id);

        if ($patient) {

            $patient->update($request->all());

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }
         
    
    public function show(Request $request, $id)
    {
        $patient = Patients::find($id);

        if ($patient) {

            $patient->update($request->all());

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patient
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy($id)
    {
        $patient = Patients::find($id);

        if ($patient) {
            $patient->delete();

            $data = [
                'message' => 'Resource is delete successfully'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }
    
    public function search($name)
    {
        $patient = Patients::where('name', 'LIKE', '%' . $name . '%')->get();

        if ($patient->isNotEmpty()) {

            $data = [
                "message" => "Get Searched Resource",
                "data" => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                "message" => "Resource not found",
            ];

            return response()->json($data, 404);
        }
    }

    public function positive()
    {
        $patient = Patients::where('status', 'positive')->get();


        if ($patient->isNotEmpty()) {
            $data = [
                "message" => "Get positive resource",
                "total" => $patient->count(),
                "data" => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                "message" => "Resource not found",
            ];
       
return response()->json($data, 404);
        }
    }

    public function recovered()
    {
        $patient = Patients::where('status', 'recovered')->get();


        if ($patient->isNotEmpty()) {
            $data = [
                "message" => "Get recovered resource",
                "total" => $patient->count(),
                "data" => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                "message" => "Resource not found",
            ];
       
return response()->json($data, 404);
        }
    }


    public function dead()
    {
        $patient = Patients::where('status', 'dead')->get();


        if ($patient->isNotEmpty()) {
            $data = [
                "message" => "Get dead resource",
                "total" => $patient->count(),
                "data" => $patient
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                "message" => "Resource not found",
            ];
       
return response()->json($data, 404);
        }
    }
}




