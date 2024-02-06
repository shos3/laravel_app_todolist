<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPrefecture extends Model
{
    protected $table = 'master_prefectures';
    protected $primaryKey = 'area_code';

    public function region()
    {
        return $this->belongsTo(MasterRegion::class, 'area_l_code', 'region_code');
    }

    public function municipalities()
    {
        return $this->hasMany(MasterMunicipality::class, 'area_s_code', 'area_code');
    }
}
