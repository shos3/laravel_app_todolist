@extends('layouts.app')
@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
    </div>
    <a href="{{ route('route_map') }}">大エリア選択へ</a>
  </div>
  <h1>{{ $regions->region_name }}の都道府県一覧</h1>
  <ul>
    @foreach($prefectures as $prefecture)
    <li><a href="{{ route('prefecture_show', ['region_code' => $regions->region_code, 'area_code' => $prefecture->area_code]) }}">{{ $prefecture->area_name }}</a></li>
    @endforeach
  </ul>
</div>
@endsection