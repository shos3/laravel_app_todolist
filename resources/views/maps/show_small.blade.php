
@extends('layouts.app')
@section('content')

<div class="container">
    <p>{{ $municipality->furigana_katakana}}</p>
    <h1>{{ $municipality->area_s_name }}の詳細</h1>
    <!-- ここに詳細情報を表示するコードを追加 -->

</div>
@endsection
