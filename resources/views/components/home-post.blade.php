
@props(['post' => $post])

<article class="flex flex-col w-full shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    {{-- <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1"> --}}
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    @foreach ($post->hashtags as $tag)
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $tag->hashtag }}</a>
                    @endforeach
                    
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="{{ route('users.posts', $post->user) }}" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published {{ $post->created_at->diffForHumans() }}
                    </p>
                    <p class="pb-6">{!! substr($post->body, 0,  130) !!} ...</p>
                    <a href="{{ route('posts.show', $post) }}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
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
</article>

