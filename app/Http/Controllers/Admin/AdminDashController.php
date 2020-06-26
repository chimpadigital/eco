<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return View('admins.index',compact('users'));
    }
}
