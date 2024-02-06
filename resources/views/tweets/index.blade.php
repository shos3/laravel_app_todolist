@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('route_tweet_create') }}">
                            <i class="bi bi-pencil-square"></i> 投稿作成へ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('tweet_mypage', ['id' => Auth::user()->id]) }}">
                            <i class="bi bi-person"></i> あなたの詳細画面へ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>
      <form action="{{ route('tweet_search') }}" method="GET" class="mb-3">
        <div class="input-group">
          <input type="text" name="query" class="form-control" placeholder="ツイートを検索">
          <button type="submit" class="btn btn-outline-secondary">検索</button>
          @if(request('query'))
            <a href="{{ route('route_tweet') }}" class="btn btn-outline-secondary">リセット</a>
          @endif
        </div>
      </form>
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
