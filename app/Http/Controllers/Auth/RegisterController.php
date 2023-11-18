<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'user_name' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->response(false, 'Please provide valid data!', null, 400, $validator->errors());
        }
        try {

            $data = $request->only(['name', 'user_name', 'email', 'password']);
            $data['email_verified_at'] =  now();
            $user = $this->createOrUpdate($data);

            return $this->response(true, 'User creadted successfully.', $user);
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!' ,null, 400);
        }
    }

    public function createOrUpdate($data = [], $user = null)
    {
        if (blank($user)) {
            $user = new User();
        }

        $user->fill($data);
        $user->save();
        return $user;
    }
}
