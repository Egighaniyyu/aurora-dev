<?php

namespace App\Models\Resepsionis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

# Call the Model
use App\Models\Master\Pasien\M_Pasien;

class RP_PatientData extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'uuid',
        'no_rm',
        'no_registrasi',
        'alergi_makanan',
        'alergi_udara',
        'alergi_obat',
        'nama_penanggung_jawab',
        'hubungan',
        'catatan',
        'nik_penanggung_jawab',
        'no_telepon_penanggung_jawab',
        'pekerjaan_penanggung_jawab',
        'status',
        'tanggal_pendaftaran',
        'jenis_kunjungan',
        'jenis_layanan',
        'poli_tujuan',
        'berat_badan',
        'tinggi_badan',
        'suhu_badan',
        'gologan_darah',
        'sistole',
        'diastole',
    ];

    public function DetailPasien()
    {
        return $this->hasMany(M_Pasien::class, 'no_rm', 'no_rm');
    }
}
