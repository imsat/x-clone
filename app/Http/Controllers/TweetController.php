<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $userId = $request->get('user_id');
        try {
            $query = Tweet::search()
                ->select('id', 'content', 'image', 'created_at')
                ->latest();

            if(data_get($request, 'user_id')){
                $query->whereUserId($userId);
            }
            $tweets = $query->paginate($perPage);
            return $this->response(true, 'Tweet list', $tweets);

        } catch (\Exception $e) {
            return $this->response(false, $e->getMessage() ?? 'Something went wrong!', null, 400);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'content' => 'required|string',
    ]);

        if ($validator->fails()) {
            return $this->response(false, 'Invalid data!',  null, 400, $validator->errors());
        }

        $data = $request->only('content', 'password');
        $data['user_id'] = Auth::user()->id;

        $tweet = Tweet::create($data);

        return $this->response(true, 'Created successfully.', $tweet);

    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        //
    }
}
