<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Hashtag;


class HomeController extends Controller
{


    public function index()
    {
        
        $hashtags = Hashtag::get();

        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        return view('home', [
            "posts" => $posts,
            "hashtags" => $hashtags 
        ]);
    }

    public function postsByHash($tag)
    {
        $hashtag = Hashtag::firstWhere('id', $tag);
        $posts = $hashtag->posts()->orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        $hashtags = Hashtag::get();
        return view('home', [
            "posts" => $posts,
            "hashtags" => $hashtags
        ]);
    }
}
