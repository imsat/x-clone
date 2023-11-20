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
}
