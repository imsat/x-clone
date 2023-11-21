<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /**
     * Like or dislike tweet.
     */
    public function likeOrDislikeTweet(User $user, Tweet $tweet, $action)
    {
        $query = DB::table('likes');

        try {
            if($action == 'like'){
                $query->insert([
                    'user_id' => $user->id,
                    'tweet_id' => $tweet->id,
                    'created_at' => now(),
                ]);
            }else{
                $query->whereUserId($user->id)->whereTweetId($tweet->id)->delete();
            }
            return $this->response(true, 'Successfully done');
        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }

    }
}
