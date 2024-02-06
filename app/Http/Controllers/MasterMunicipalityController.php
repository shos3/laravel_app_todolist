<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterMunicipality;
use App\Models\MasterRegion;
use App\Models\MasterPrefecture; 

class MasterMunicipalityController extends Controller
{
    public function index(){
        $municipality = MasterMunicipality::all();
        return view('master_municipality.index', compact('municipality'));
    }


    public function show($region_code, $area_code, $group_code){
        $municipality = MasterMunicipality::where('area_s_code', $area_code)
        ->where('group_code', $group_code)
        ->first();
        return view('maps.show_small', compact('municipality'));
    }

}
