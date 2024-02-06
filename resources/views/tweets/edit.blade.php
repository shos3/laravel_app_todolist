@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ツイート編集</h1>
        <form action="{{ route('tweet_update', ['id' => $tweet->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="text">ツイート内容:</label>
            <textarea name="text" id="textPUTows=3">{{ $tweet->text }}</textarea>

            <button type="submit">更新する</button>
        </form>
    </div>
@endsection
