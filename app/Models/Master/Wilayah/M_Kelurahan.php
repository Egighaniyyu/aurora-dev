<?php

namespace App\Models\Master\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'm__kelurahans';
    protected $fillable = ['kecamatan_id', 'code', 'name'];

    public function kecamatan()
    {
        return $this->belongsTo(M_Kecamatan::class, 'kecamatan_id');
    }
}
