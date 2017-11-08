<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends BaseController
{
    public function postLogin(Request $request)
    {
        $auth        = $this->getAuth();
        $credentials = $request->only('name', 'password');

        try {
            if (!$token = $auth->attempt($credentials)) {
                return $this->errorUnauthorized();
            }
        } catch (JWTException $e) {
            return $this->errorInternal();
        }

        return response()->json(compact('token'));
    }

    public function postRegister(Request $request)
    {
        $data      = $request->only('name', 'email', 'password');
        $validator = Validator::make($data, [
            'name'     => 'required|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->errorBadRequest($validator->messages());
        }

        $user = User::createUser($data);
        if ($user) {
            $token = $this->getAuth()->fromUser($user);
            return response()->json(compact('token'));
        } else {
            return $this->errorInternal();
        }
    }

    public function postRefresh(Request $request)
    {
        $auth  = $this->getAuth();
        $token = $auth->getToken();
        $token = $auth->refresh($token);
        return response()->json(compact('token'));
    }
}
