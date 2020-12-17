<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Hashtag;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy', 'duplicate']);
    }

    public function randomPost(Request $request)
    {
        $post = new Post;
        return back();
    }

    public function duplicate(Post $post, Request $request)
    {
        $new_post = $post->replicate();
        $new_post->user_id = $request->user()->id;
        $new_post->save();
        return back();
    }

    public function index()
    {
        
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(20);
        return view('posts.index', [
            "posts" => $posts
        ]);
    }

    public function show(Post $post)
    {
        $post->increment('views', '1');
        return view('posts.show', [
            'post' => $post 
        ]);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'body' => 'required',
            'title' => 'required'
        ]);

        $post = $request->user()->posts()->create($request->only('body', 'title'));
        $hashtags_str = $request->hashtags;
        $hashtags_str = strtolower($hashtags_str);
        $hastags_arr = explode(" ", $hashtags_str);
        $hastags_arr = array_unique($hastags_arr);
        $hastags_arr = array_filter($hastags_arr, fn($value) => !is_null($value) && $value !== '');
        foreach($hastags_arr as $a){
            $hash = Hashtag::firstWhere('hashtag', $a);
            if(!$hash){
                $hashtag = new Hashtag();
                $hashtag->hashtag = $a;
                $hashtag->posts()->attach($hashtag->id);
                $hashtag->save();
            }else{
                $hashtag = $hash;
            }
            $post->hashtags()->attach($hashtag->id);
        }

        return back();
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
