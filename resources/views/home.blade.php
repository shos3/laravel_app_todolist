@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::check())
                <p>Welcome, {{ $user->name }}!</p>
            @else
                <p>Welcome, Guest!</p>
            @endif

        </div>
        <a href="{{ route('route_tweet') }}">投稿一覧へ</a>
        <a href="{{ route('route_map') }}">mapへ</a>
    </div>
</div>
@endsection

