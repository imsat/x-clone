<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    /**
     * Get user follower.
     */
    public function userFollower(User $user, Request $request)
    {
        $perPage = $request->get('per_page', 10);
        try {
            $userFollowers = $user->followers()->paginate($perPage);
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
            $userFollowings = $user->following()->paginate($perPage);
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
        $authId = auth()->user()->id;
        if ($user->id == $authId) {
            return $this->response(false, 'You cannot follow your own profile.!', 'null', 403);
        }

        try {
            $checkExist = $user->followers()->where('following_id', $authId)->first();
            if ($checkExist) {
                return $this->response(false, 'Already followed!', 'null', 409);
            } else {
                $user->follower()->create(['following_id' => $authId]);
                return $this->response(true, 'Successfully followed');
            }
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }
    }

    /**
     * Unfollow user.
     */
    public function unFollow(User $user)
    {
        $user->followers()->where('following_id', auth()->user()->id)->delete();
        return true;
    }
}
