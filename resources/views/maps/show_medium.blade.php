@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- ここに必要な要素を追加 -->
        </div>
        <a href="/map">中エリア選択へ</a>
    </div>

    <h1 class="mt-4">{{ $prefecture->area_name }}の市区町村一覧({{ $municipalities->count() }})</h1>

    <div class="row">
        @forelse ($municipalities as $municipality)
            <div class="col-md-2 mb-1">
                <div class="card">
                    <div class="card-body">
                        <p style="font-size:7px">{{ $municipality->furigana_katakana }}</p>
                        <a href="{{ route('municipality_show', ['region_code' => $region->region_code, 'area_code' => $prefecture->area_code, 'group_code' => $municipality->group_code]) }}">
                            {{ $municipality->area_s_name }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>市区町村がありません</p>
        @endforelse
    </div>
</div>
@endsection
