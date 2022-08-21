<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    //
    public function login(AuthRequest $request){

        $user = User::where('email',$request->email)->first();
        if(! $user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
            'email' => ['The provided  credential are incorrect.'],
            ]);
        }
        return $user->createToken($request->email)->plainTextToken;
    }
    
}
