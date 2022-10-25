<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResertPasswordRequest;
use App\Http\Requests\GetUserInfoRequest;

class UserController extends Controller
{
    public static function getUserCount()
    {
        $users = User::query()->get();
        $usersCount = $users->count();
        return $usersCount;
    }

    public function registerUser(RegisterRequest $request)
    {
        try {
            $name =  $request->name;
            $pass =  bcrypt($request->pass);
            $email =  $request->email;
            $token = Str::random(80);

            $user = User::query()->create([
                'name' => $name,
                'password' => $pass,
                'email' => $email,
                'stoken' => $token
            ]);

            return response()->json([
                'status' => 'success',
                'token' => $user->stoken
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function userCheck(Request $request)
    {
        $token = $request->token;
        $user = User::query()->where('stoken', $token)->first();

        if($user == null){
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => true,
        ]);
    }

    public function login(LoginRequest $request)
    {
        try {
            $email = $request->email;
            $password = bcrypt($request->password);

            $user = User::query()->where('email', $email)->first();

            if( $user == null ){
                return response()->json([
                    'status' => 'invalid login',
                ]);
            }

            $token = Str::random(80);

            $user->stoken = $token;
            $user->save();

            return response()->json([
                'status' => 'success',
                'token' => $user->stoken
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function resertPassword(ResertPasswordRequest $request)
    {
        try {
            $newPassword = $request->password;
            $oldPassword = bcrypt($request->password);
            $token =  $request->token;
            $user = User::query()->where('stoken', $token)->where('password', $oldPassword)->first();
            
            if ($user == null){
                return response()->json([
                    'status' => 'error'
                ]);
            }

            $user->password = bcrypt($newPassword);
            $user->save();

            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'status' => 'error'
            ]);

        }
    }

    public function getUserInfo(GetUserInfoRequest $request)
    {
        try {
            $token = $request->token;
            $user = User::query()->where('stoken', $token)->first();

            if ( $user == null ) {
                return response()->json([
                    'status' => 'error'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'user' => $user
            ]);
        }
    }
}
