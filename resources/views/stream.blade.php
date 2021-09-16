
@extends('layouts.app')

@section('content')
<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />

<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
    <div class="flex justify-center mt-8 mb-20">
        <div class="w-full bg-white p-6 rounded-lg ">
            {{-- <video
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="640"
            height="264"
            poster="MY_VIDEO_POSTER.jpg"
            data-setup="{}"
          >
            <source src="http://live.ihor.live/live.m3u8" type="application/x-mpegURL" />
            <p class="vjs-no-js">
              To view this video please enable JavaScript, and consider upgrading to a
              web browser that
              <a href="https://videojs.com/html5-video-support/" target="_blank"
                >supports HTML5 video</a
              >
            </p>
          </video> --}}
          <video id="my_video_1" id="my-video" class="video-js" controls preload="auto" width="640" height="268" 
          data-setup='{}'>
            <source src="https://live.ihor.live/live.m3u8" type="application/x-mpegURL">
          </video>

          <hr>
          <h1>The List of recorded videos</h1>
          <hr>

          @foreach ($records as $record)
          {{var_dump(asset('css/app.css'))}}
          <video class="video-js" controls preload="auto" width="640" height="268" 
          data-setup='{}'>
            <source src="{{ $record }}" type="video/mp4">
          </video>
          @endforeach
        
          <script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>
        </div>

    </div>
@endsection