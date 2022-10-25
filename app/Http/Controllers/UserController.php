<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

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

    public function login(Request $request)
    {
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
    }
}
