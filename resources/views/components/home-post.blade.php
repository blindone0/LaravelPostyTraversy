
@props(['post' => $post])

<div class="mb-4 border-b-2 border-fuchsia-600">
    <div class="text-right mb-2">

    <a href="{{ route('users.posts', $post->user) }}" class="font-bold ">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    </div>
    <h1 class="mb-4 text-5xl py-8">{{$post->title}}
</h1>
        <a href="{{ route('posts.show', $post) }}" class="border-2 rounded-md text-grey m-10 my-3 px-2 py-2 border-gray-500 font-mono text-3xl">Read</a>


    <div class=" items-center text-right">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
        <span class="m-1 p-1">{{ $post->views }} {{ Str::plural('view', $post->views) }}</span>
    </div>
</div>

