<?php

namespace App\Http\Controllers;

use App\Models\MasterMunicipality;
use Illuminate\Http\Request;
use App\Models\MasterRegion;
use App\Models\MasterPrefecture;

class MasterRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $regions = MasterRegion::all();
        return view('maps.index', compact('regions'));
    }


    public function show($region_code){
        $regions = MasterRegion::where('region_code', $region_code)->first();
        $prefectures = $regions->prefectures;
        $prefecture_count = $prefectures->count();
        return view('maps.show_large', compact('regions', 'prefectures', 'prefecture_count'));
    }

}
