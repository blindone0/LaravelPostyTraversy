@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full bg-white p-6 rounded-lg ">

            <form action="{{ route('posts') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="title" class="sr-only">Title</label>
                    <input name="title" value="{{ old('title') }}" id="title" class="bg-gray-100 border-2 w-full mb-2 @error('title') border-red-500 @enderror" placeholder="Title" type="text">
                    @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                    </div>
                    @enderror
                    <label for="hashtags" class="sr-only">Hashtags</label>
                    <input name="hashtags" id="hashtags" value="{{ old('hashtags') }}" class="bg-gray-100 border-2 w-full mb-2" placeholder="Hashtags" type="text">

                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" value="{{ old('body') }} class="bg-gray-100 border-2 w-full p-4 lounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Post something!">

                    </textarea>
                    @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded
                font-medium">Post</button>
                </div>
            </form>
           
            @if($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
        </div>

    </div>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>
@endsection