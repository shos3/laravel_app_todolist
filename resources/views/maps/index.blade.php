
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
        <a href="{{ route('home') }}">TOPへ</a>
    </div>

    @foreach($regions as $region)
      <li><a href="{{ route('region_show', ['region_code' => $region->region_code]) }}">{{ $region->region_name }}</a></li>
    @endforeach

    <img src="{{ asset('storage/images/OK.png') }}" usemap="#ImageMap" alt="Nihon_Image">
    <map name="ImageMap">
      <area shape="rect" coords="178,0,324,100" href="{{ route('region_show', ['region_code' => '1']) }}" alt="" />
    </map>


        </div>
@endsection

{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- ここに必要な要素を追加 -->
        </div>
        <a href="{{ route('home') }}">TOPへ</a>
    </div>
    <div class="row">
      @foreach($regions as $region)
            <div class="col-md-2 mb-3">
                <div class="card">
                    <div class="card-body"><a href="{{ route('region_show', ['region_code' => $region->region_code]) }}"></a>{{ $region->region_name }}</div>
                </div>
            </div>
        @endforeach
    </div>
    <img src="{{ asset('storage/images/OK.png') }}" usemap="#ImageMap" alt="Nihon_Image">
    <map name="ImageMap">
      <area shape="rect" coords="" href="{{ route('region_show', ['region_code' => '1']) }}" alt="" />
    </map>
</div>
@endsection
--}}