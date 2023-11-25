<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    /**
     * Get user follower.
     */
    public function userFollower(User $user, Request $request)
    {
        $perPage = $request->get('per_page', 15);
        try {
            $userFollowers = User::with(['followers' => function ($query) {
                $query->where('following_id', auth()->id())
                    ->select('id', 'user_id', 'following_id');
            }])
                ->whereHas('following', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                })->select('id', 'name', 'user_name', 'avatar')
                ->paginate($perPage);


            return $this->response(true, 'User follower list', $userFollowers);
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }
    }

    /**
     * Get user follower.
     */
    public function userFollowing(User $user, Request $request)
    {
        $perPage = $request->get('per_page', 10);
        try {
            $userFollowings = User::with(['followers' => function ($query) {
                $query->where('following_id', auth()->id())
                    ->select('id', 'user_id', 'following_id');
            }])->whereHas('followers', function ($q) use ($user) {
                $q->where('following_id', $user->id);
            })->select('id', 'name', 'user_name', 'avatar')
                ->paginate($perPage);

            return $this->response(true, 'User following list', $userFollowings);
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }
    }

    /**
     * Follow user.
     */
    public function follow(User $user)
    {
        $authId = auth()->id();
        if ($user->id == $authId) {
            return $this->response(false, 'You cannot follow your own profile.!', 'null', 403);
        }

        try {
            $user->followers()->create(['following_id' => $authId]);
            return $this->response(true, 'Successfully followed');
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }
    }

    /**
     * Unfollow user.
     */
    public function unFollow(User $user)
    {

        try {
            $user->followers()->where('following_id', auth()->user()->id)->delete();
            return $this->response(true, 'Successfully unfollowed');

        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }
    }
}
