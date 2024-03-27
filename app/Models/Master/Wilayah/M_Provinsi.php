<?php

namespace App\Models\Master\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Provinsi extends Model
{
    use HasFactory;

    protected $table = 'm__provinsis';
    protected $fillable = ['name', 'code'];

    public function kabupaten()
    {
        return $this->hasMany(M_Kabupaten::class, 'provinsi_id');
    }
}
