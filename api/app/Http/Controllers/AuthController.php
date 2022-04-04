<?php

namespace App\Http\Controllers;

use Error;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required|string',
      'email' => 'required|string|unique:users,email|regex:/(.+)@(.+)\.(.+)/i',
      'password' => 'required|string|confirmed'
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

    $token = $user->createToken('primeirtoken')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token
    ];

    return response($response, 201);
  }
}
