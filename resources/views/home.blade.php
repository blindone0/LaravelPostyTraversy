@extends('layouts.app')

@section('content')

    <div class="justify-center text-center mb-4">
        @if($hashtags->count())
            @foreach ($hashtags as $tag)
                <a class="rounded-full py-2 mx-1 px-3 border-black border-2 border-indigo-900" href="{{route('postsByHash', $tag)}}">{{$tag->hashtag}}</a>
            @endforeach
        @endif
    
    </div>


    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg ">
        @if($posts->count())
                @foreach ($posts as $post)
                    <x-home-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
        </div>
        </div>

    </div>
@endsection
