<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMunicipality extends Model
{
    protected $table = 'master_municipalities';
    protected $primaryKey = 'area_s_code';

    public function prefecture()
    {
        return $this->belongsTo(MasterPrefecture::class, 'area_l_code', 'area_s_code');
    }
}
