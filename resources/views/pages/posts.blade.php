@extends('layout')

@section('content')
    @guest
        <p>
            <a href="{{$instaLink}}">Instagram Auth</a>
        </p>
    <p>
        <a href="{{$gitHubLink}}">Github Auth</a>
    </p>
    @endguest
    @auth
        <p>{{auth()->user()->name}}</p>
        @endauth
@foreach($posts as $post)
    @include('partials.post', ['post'=>$post])
@endforeach



    @endsection
