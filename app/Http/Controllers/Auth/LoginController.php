<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Login valid user and return token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return $this->response(false, 'Invalid data!',  null, 400, $validator->errors());
        }
        $credential = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credential)) {
            return $this->response(false, 'Wrong email or password!!', null,  403, $validator->errors());
        }

        $userData = auth()->user()->only(['id', 'name', 'user_name', 'email', 'email_verified_at', 'avatar']);

        $data = [
            'token' => $token,
            'user' => $userData,
            'message' => 'Login successfully',
        ];
        return $this->response(true, 'Login successfully.', $data);

    }

    /**
     * Logout authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return $this->response(true, 'Logout successfully.');
    }

}
