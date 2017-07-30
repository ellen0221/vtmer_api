<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {
        return user::all();
    }

    public function show($id)
    {
        $user = user::findOrFail($id);
        // 数组形式
        return $user;
    }
}
