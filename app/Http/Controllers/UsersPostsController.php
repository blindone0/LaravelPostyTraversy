<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersPostsController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        foreach ($posts as $p) {
            $p->increment('views', '1');
        }
        
        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
