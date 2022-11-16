<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthRequest $authRequest)
    {
        $inputs = $authRequest->validated();
        
        $credentials = [
            'email'     => $inputs['email'],
            'password'  => $inputs['password'],
        ];

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Houve um erro inesperado.'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => bcrypt($request->password)
        ]);        
        return response()->json(['resposta' => "$user->name cadastrado com sucesso."]);
    }
}