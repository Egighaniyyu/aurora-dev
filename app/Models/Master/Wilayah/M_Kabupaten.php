<?php

namespace App\Models\Master\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'm__kabupatens';
    protected $fillable = ['provinsi_id', 'code', 'name', 'full_code'];

    public function provinsi()
    {
        return $this->belongsTo(M_Provinsi::class, 'provinsi_id');
    }

    public function kecamatan()
    {
        return $this->hasMany(M_Kecamatan::class, 'kabupaten_id');
    }
    
}
