<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        try {
            $users = User::search()
                ->select('id', 'name', 'user_name', 'avatar')
                ->whereStatus(1)
                ->latest()
                ->paginate($perPage);
            return $this->response(true, 'User list', $users);
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            $user->loadCount(['followers', 'following', 'likes']);

            return $this->response(true, 'User profile', $user);
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }
    }
}
