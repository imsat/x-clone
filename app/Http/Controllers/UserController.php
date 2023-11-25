<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        try {
            $query = User::with(['followers' => function ($query) {
                $query->where('following_id', auth()->id())
                    ->select('id', 'user_id', 'following_id');
            }])->search()
                ->select('id', 'name', 'user_name', 'avatar')
                ->whereStatus(1);

            if ($request->has('random')) {
                $query->inRandomOrder()->where('id', '<>',auth()->id());
            } else {
                $query->latest();
            }

            $users = $query->paginate($perPage);
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
