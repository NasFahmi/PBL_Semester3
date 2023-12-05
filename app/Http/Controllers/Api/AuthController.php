<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\AuthLoginResources;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthController extends Controller
{
    public function AuthLogin (AuthLoginRequest $request)
    {
         // ! mendapatkan semua data
         $data = $request->validated();
         

         $user = User::where('nama', $data['username'])->first();
        //  dd($user);
         if (!$user || !Hash::check($data['password'], $user->password)) {
             throw new HttpResponseException(response([
                 "errors" => [
                     "username" => [
                         "Username or password is incorrect"
                     ]
                 ]
             ], 400));
         }
         // ! membuat token berdasarkan username
         return response()->json(new AuthLoginResources($user), 200);
    }
    public function logout(Request $request) {
        // dd($request->user());
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status'=>200,'message' => 'Logged out successfully'], 200);
    }
}
