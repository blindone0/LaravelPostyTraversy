@extends('layouts.app')

@section('content')

    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                Ihor's blog
            </a>
            <p class="text-lg text-gray-600">
                Daily tech blogpost on INTERNET
            </p>
        </div>
    </header>

        <!-- Topic Nav -->
    <nav class="border-t border-b bg-gray-50" x-data="{ open: false }">
        <div class="">
            <a
                href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
            <div class="text-center">
                @if($hashtags->count())
                    @foreach ($hashtags as $tag)
                        <a href="{{route('postsByHash', $tag)}}" class="hover:bg-gray-400 rounded px-1 mx-0">{{$tag->hashtag}}</a>
                    @endforeach
                    @else
                        <p>There are no topics</p>
                @endif
                
            </div>
    </nav>

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">




            @if($posts->count())
                @foreach ($posts as $post)
                    <x-home-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif


        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Abouе site</p>
                <p class="pb-2">Hello, here you can post your articles or read already existing. Just register and start posting. Happy blogging</p>
                <a href="{{route('contact.store')}}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                </div>
                <a href="https://www.instagram.com/zkixcidstgbnm/" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @zkixcidstgbnm
                </a>
            </div>

        </aside>

</div>


    </div>
@endsection
