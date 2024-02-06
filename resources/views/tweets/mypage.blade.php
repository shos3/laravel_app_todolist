@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="{{ route('tweet_search') }}">戻る</a>
      @foreach ($tweets as $tweet)
        <div class="card mb-3">
          <div class="card-body d-flex justify-content-between">
            <div class="d-flex align-items-center">
              <h5 class="card-title me-3"><a href="{{ route('tweet_mypage', ['id' => $tweet->user->id]) }}">{{ $tweet->user->name }}</a></h5>
              <p class="card-text text-muted small">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
            </div>
            @if (Auth::check() && Auth::user()->id === $tweet->user_id)
              <div class="ml-auto">
                <a href="{{ route('tweet_edit', ['id' => $tweet->id]) }}" class="btn btn-primary">編集</a>
                <form action="{{ route('tweet_destroy', ['id' => $tweet->id]) }}" method="POST" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">削除</button>
                </form>
              </div>
            @endif
          </div>
          <div class="ms-3 mb-2">
            <p class="card-text">{{ $tweet->text }}</p>
          </div>
        </div>
      @endforeach
      <div>
        {{ $tweets->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
</div>
@endsection