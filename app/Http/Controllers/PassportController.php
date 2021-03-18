<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PassportController extends Controller
{
  public function register(Request $request)
  {
      $this->validate($request, [
          'name' => 'required|min:3',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6',
      ]);

      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password)
      ]);

      $token = $user->createToken('admin')->accessToken;

      return response()->json(['token' => $token], 200);
  }
}
