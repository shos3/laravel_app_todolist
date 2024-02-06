<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterPrefecture;
use App\Models\MasterRegion;
use App\Models\MasterMunicipality;


class MasterPrefectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prefecture = MasterPrefecture::all();

        return view('maps.show', compact('prefecture'));
    }

    public function show($region_code, $area_code){
        $prefecture = MasterPrefecture::where('area_code', $area_code)->first();
        $region = $prefecture->region;
        if ($region) {
            $municipalities = MasterMunicipality::where('area_s_code', $prefecture->area_code)->get();
            return view('maps.show_medium', compact('region', 'prefecture', 'municipalities'));
        } else {
            return abort(404);
        }
    }
}
