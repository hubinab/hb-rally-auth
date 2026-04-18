<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // A video alapjan a feladatban authenticate van
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $token = $request->user()->createToken("app");
            return response()->json([
                "data" => [
                    "token" => $token->plainTextToken
                ]
            ]);
        } else {
            return response()->json([
                "data" => [
                    "message" => "Sikertelen bejelentkezés!"
                ]
            ], 401);
        }
    }
}
