<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public static function getUserCount()
    {
        $users = User::query()->get();
        $usersCount = $users->count();
        return $usersCount;
    }
}
