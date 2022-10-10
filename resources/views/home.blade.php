@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layout.app')

@section('content')
    @if(Auth::user())
        @include('layout.navigation')
        @include('posts.form')
    @else
        @include('layout.guest-navigation')
    @endif
    <div class="container">
        @include('posts.posts')
    </div>
@endsection