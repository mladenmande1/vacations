<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\VacationRequests;
use \App\User;

class ApiController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function all($type = null) 
    {
        if(isset($type)) {
            if($type == 1) {
                $vacation_requests = VacationRequests::where('approved', 1)->get();
            } else if($type == 0) {
                $vacation_requests = VacationRequests::where('approved', 0)->get();
            }
        } else {
            $vacation_requests = VacationRequests::all();
        }
        return $vacation_requests;
    }

    public function approve($vacation_request_id) 
    {
        $vacation_request = VacationRequests::find($vacation_request_id);
        $vacation_request->approved = 1;
        $vacation_request->save();
        return response()->json($vacation_request, 200);
    }

    public function decline($vacation_request_id) 
    {
        $vacation_request = VacationRequests::find($vacation_request_id);
        $vacation_request->approved = 0;
        $vacation_request->save();
        return response()->json($vacation_request, 200);
    }

    public function store(Request $request) 
    {
        $vacation_request = VacationRequests::create($request->all());
        return response()->json($vacation_request, 201);
    }

    public function delete(VacationRequests $vacation_request)
    {
        $vacation_request->delete();
        return response()->json(null, 204);
    }

    public static function users()
    {
        $users = User::all();
        return $users;
    }
}
