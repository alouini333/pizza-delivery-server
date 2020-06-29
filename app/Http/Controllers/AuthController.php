<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use App\User;
use App\Utils\Utils;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {

            $credentials = $request->only(['email', 'password']);
            if (! $token = JWTAuth::attempt($credentials)) {
                return Utils::returnError('Unauthorized', 401);
            }
            return Utils::returnToken($token);
            
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }

    public function signup(SignUpRequest $request)
    {
        try {
            $filteredRequest = $request->only([
                'name',
                'last_name',
                'email',
                'phone',
                'gender',
                'password'
            ]);
            $user = new User;
            $user->fill($filteredRequest);
            $user->save();
            
            auth()->login($user);
            
            $token = JWTAuth::fromUser($user);

            return Utils::returnToken($token);
            
        } catch (\Excpetion $e) {
            return Utils::handleException($e);
        }
    }

    public function logout()
    {
        try {
            Auth::guard()->logout();
            return Utils::returnSuccess('Logged out with success');
        } catch(\Exception $e) {
            return Utils::handleException($e);
        }
    }

    public function refresh()
    {
        try {
            $token = JWTAuth::refresh();

            return Utils::returnToken($token);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }
}
