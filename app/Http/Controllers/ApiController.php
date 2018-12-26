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
        if(empty($vacation_request)) {
            return response()->json(null, 401);
        }
        $vacation_request->approved = 1;
        
        $new_vacation_days = $vacation_request->countDays();

        if(($vacation_request->user->availableFreeDays() - $new_vacation_days) >= 0) {
            $vacation_request->save();
            return response()->json($vacation_request, 200);
        } else {
            return response()->json(['message' => 'Not enough free vacation days'], 401);
        }
        
    }

    public function decline($vacation_request_id) 
    {
        $vacation_request = VacationRequests::find($vacation_request_id);
        $vacation_request->approved = 0;
        $vacation_request->save();
        return response()->json($vacation_request, 200);
    }

    public function create(Request $request) 
    {
        $vacation_request = VacationRequests::create($request->all());
        return response()->json($vacation_request, 201);
    }

    public function delete($vacation_request_id)
    {
        $vacation_request = VacationRequests::find($vacation_request_id);
        $vacation_request->delete();
        return response()->json(null, 204);
    }

    public static function users()
    {
        $users = User::all();
        foreach($users as $row) {
            $row->availableFreeDays = $row->availableFreeDays();
        }
        return $users;
    }

    public static function user($user_id)
    {
        $user = User::find($user_id);
        $user->availableFreeDays = $user->availableFreeDays();
        return $user;
    }
}
