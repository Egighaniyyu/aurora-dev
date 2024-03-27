<?php

namespace App\Models\Master\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'm__kecamatans';
    protected $fillable = ['kabupaten_id', 'code', 'name', 'full_code'];

    public function kabupaten()
    {
        return $this->belongsTo(M_Kabupaten::class, 'kabupaten_id');
    }

    public function kelurahan()
    {
        return $this->hasMany(M_Kelurahan::class, 'kecamatan_id');
    }
}
