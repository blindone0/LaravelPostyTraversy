
@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form class="w-full max-w-sm" action="" method="post" action="{{ route('contact.store') }}">

            @csrf
        
            <div class="form-group flex items-center border-b border-teal-500 py-2">
                <label>Name</label>
                <input class="form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none {{ $errors->has('phone') ? 'error' : '' }}" type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
        
                <!-- Error -->
                @if ($errors->has('name'))
                <div class="error">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>
        
            <div class="form-group flex items-center border-b border-teal-500 py-2">
                <label>Email</label>
                <input  type="email" class="form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none {{ $errors->has('phone') ? 'error' : '' }}" name="email" id="email">
        
                @if ($errors->has('email'))
                <div class="error">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
        
            <div class="form-group flex items-center border-b border-teal-500 py-2">
                <label>Phone</label>
                <input type="text" class="form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
        
                @if ($errors->has('phone'))
                <div class="error">
                    {{ $errors->first('phone') }}
                </div>
                @endif
            </div>
        
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none {{ $errors->has('phone') ? 'error' : '' }}" name="subject"
                    id="subject">
        
                @if ($errors->has('subject'))
                <div class="error">
                    {{ $errors->first('subject') }}
                </div>
                @endif
            </div>
        
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none {{ $errors->has('phone') ? 'error' : '' }}" name="message" id="message"
                    rows="4"></textarea>
        
                @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message') }}
                </div>
                @endif
            </div>
        
            <input type="submit" name="send" value="Submit" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded">
        </form>
    </div>

@endsection
