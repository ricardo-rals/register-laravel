<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|string',
      'password' => 'required|string'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response([
        'message' => 'Usuário ou Senha inválidos'
      ], 401);
    }

    $token = $user->createToken('tokenAccess')->plainTextToken;

    $response = [
      'user' => $user,
      'token' => $token
    ];

    return response($response, 201);
  }

  public function logout(Request $request)
  {
    auth()->user()->tokens()->delete();

    return [
      'message' => 'Logout efetuado com sucesso'
    ];
  }

  public function index(Request $request)
  {
    return User::all();
  }
}
