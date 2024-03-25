<?php

namespace App\Models\Master\Pasien;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_Pasien extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'no_rm',
        'no_bpjs',
        'nik',
        'nama_depan',
        'nama_belakang',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_menikah',
        'nama_orangtua',
        'no_telepon',
        'agama',
        'gol_darah',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat_ktp',
        'alamat_domisili',
        'alergi_makanan',
        'alergi_udara',
        'alergi_obat',
        'hubungan_penanggung_jawab',
        'nik_penanggung_jawab',
        'nama_penanggung_jawab',
        'no_telepon_penanggung_jawab',
        'alamat_penanggung_jawab',
        'pekerjaan_penanggung_jawab',
        'tanggal_pendaftaran',
        'status',
        'alasan_tidak_aktif',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'no_rm';
    }

    public function getNamaLengkapAttribute($value)
    {
        return $this->nama_depan . ' ' . $this->nama_belakang;
    }

    public function getKeyType ()
    {
        return 'string';
    }

    public function getNoTeleponAttribute($value)
    {
        $value = '+62 '. substr($value, 0, 3) . '-' . substr($value, 3, 4) . '-' . substr($value, 7, 4);
        return $value;
    }

    public function getTanggalLahirAttribute($value)
    {
        return date('d-M-Y', strtotime($value));
    }

    // public function getAlamatLengkapAttribute($value)
    // {
    //     return $this->alamat_ktp . ' ' . $this->kelurahan . ' ' . $this->kecamatan . ' ' . $this->kabupaten . ' ' . $this->provinsi;
    // }
}
