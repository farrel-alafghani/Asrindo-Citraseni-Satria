<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [

            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8',
            'roleid'    => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'roleid' => $request->roleid
        ]);

        //return response JSON user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'user'    => $user,
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }
}
