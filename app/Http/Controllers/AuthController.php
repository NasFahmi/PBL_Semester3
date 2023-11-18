<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginview()
    {
        return view('pages.enduser.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AuthLogin(AuthLoginRequest $authLoginRequest)
    {
        $authLoginRequest->validated();
        
    }
}
