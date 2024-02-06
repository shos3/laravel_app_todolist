<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRegion extends Model
{
    protected $table = 'master_regions';
    protected $primaryKey = 'region_code';

    public function prefectures()
    {
        return $this->hasMany(MasterPrefecture::class, 'area_l_code', 'region_code');
    }
}
