<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends BaseController
{
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return $this->sendResponse([], 'Đăng xuất thành công.');
    }

    public function register(Request $request)
    {


        $validator  =  Validator::make(

            $request->all(),
            [
                'username' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string',
                'password_confirmation' => 'required|same:password',
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Lỗi xác thực', $validator->errors());
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user['user_type_id'] = $input['user_type_id'] ?? 1;
        $user = User::create($input);

        $response = [
            'user' => $user,
        ];

        return $this->sendResponse($response, "Đăng ký thành công, Vui lòng đăng nhập.");
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return $this->sendError('Sai email hoặc mật khẩu', [], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return $this->sendResponse($response, 'Đăng nhập thành công.');
    }
}
