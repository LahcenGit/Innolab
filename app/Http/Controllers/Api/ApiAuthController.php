<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\UserResource;
use Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class ApiAuthController extends BaseController
{
    //
    public function login(AuthRequest $request){

        $user = User::where('email',$request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            return $this->sendError('Incorrect Data'); 
        }

        $data['token'] =  $user->createToken($request->email)->plainTextToken;
        return $this->sendResponse($data, 'User login successfully.');
    }
    
}
