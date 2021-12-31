<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Reponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request )
    {
        $fields = $request->validate([
            'username'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'fullname'=>'required|string',
            'phone'=>'required|string',
            'avatar'=>'required|string',
            'address'=>'required|string',
            'birthday'=>'required|string',
            'user_type_id'=>'required|int',
        ]);

        $user = User::create([
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'fullname' => $fields['fullname'],
            'phone' => $fields['phone'],
            'avatar' => $fields['avatar'],
            'address' => $fields['address'],
            'birthday' => $fields['birthday'],
            'user_type_id' => $fields['user_type_id'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $reponse = [
            'user' => $user,
            'token' => $token,
        ];

        return response($reponse, 200);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong username or password '
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function logout(Request $request){
        #code
    }
}
