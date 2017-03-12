<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AccountController extends Controller
{
    public function account()
    {
        return view('account.settings');
    }

    public function accountPassword()
    {
        return view('account.password');
    }
}
