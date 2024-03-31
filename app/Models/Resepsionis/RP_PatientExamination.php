<?php

namespace App\Models\Resepsionis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

# Call the model
use App\Models\Master\Pasien\M_Pasien;

class RP_PatientExamination extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'id', // auto increment
        'uuid', // primary key
        'no_rm',
        'no_registrasi',
        'catatan',
        'status',
        'tanggal_pendaftaran',
        'jenis_kunjungan',
        'jenis_layanan',
        'poli_tujuan',
        'berat_badan',
        'tinggi_badan',
        'suhu_badan',
        'sistole',
        'diastole',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function patient()
    {
        return $this->hasOne(M_Pasien::class, 'no_rm', 'no_rm');
    }
}
