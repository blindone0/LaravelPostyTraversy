@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-8 mb-20">
        <div class="w-full bg-white p-6 rounded-lg ">
            <h1 class="text-xl">Intelligent Webapps for Your Business Logic</h1>
            <hr>
            <p class="mt-2 mb-2">Hello, and welcome to the blog of passionated software developer, Ihor. If you would like to hire me as a developer or just ask for free IT cosultation you are welcome to fill contact form. And I'll get in touch with you as soon as possible. Have a nice day</p>
            <h5 class="test-lg">providing simplicity </h5>
            <hr>
            <div class="text-center">
            <a class="hover:underline shadow-inner ring-4 mt-2 border" href="{{ route('downloadFile', "cvIhorRadetskyi.docx") }}">Download my resume</a>
            </div>
        </div>

    </div>
@endsection