<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

// itt is a video alapjan van elnevezve a feladatban
// RegisterController es store metodus van (registration helyett)
class RegistrationController extends Controller
{
    public function registration(RegistrationRequest $request) :JsonResponse
    {
        $data = $request->validated();
        $user = User::create($data);
        return response()->json([
            "data" => [
                "message" => "A(z) $user->email sikeresen regisztrált!"
            ]
        ]);
    }
}
