@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title', 'Dashboard')

@push('page-css')
    {{-- <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css"> --}}
@endpush

@section('content')
    <div class="p-4 sm:ml-64" onload="init()">
        <div class="mt-14">

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('resepsionis.index') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#0eb0f1] dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <a href="{{ route('data-pasien.index') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#0eb0f1] dark:text-gray-400 dark:hover:text-white">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1">Data Pasien</span>
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pendaftaran
                                Pasien
                                Baru</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mt-4 p-8 w-full bg-white rounded-[32px]">
                <div class="title-card mb-8">Pendaftaran Pasien Baru</div>
                <form action="{{ route('data-pasien.update', $getData->uuid) }}" method="POST" class="w-full">
                    @method('PUT')
                    @csrf
                    <div class="subtitle-large-form mb-8">Data Diri</div>
                    <div class="mb-8">
                        <label for="noRm"
                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">No. Reka
                            Medis</label>
                        <input type="text" id="noRm" name="noRm"
                            class="bg-[#f2f2f2] text border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $getData->no_rm }}" readonly required />
                    </div>
                    <div class="mb-8">
                        <label for="no_bpjs" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No.
                            BPJS</label>
                        <input type="number" id="no_bpjs" name="noBpjs" maxlength="13"
                            value="{{ old('noBpjs', $getData->no_bpjs) }}"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan No. BPJS" />
                        <span id="bpjs-warning" style="display: none; color: red;"></span>
                        <span id="bpjs-countWarning" style="display: none; color: red;"></span>
                    </div>
                    <div class="grid gap-6 mb-8 md:grid-cols-3">
                        <div>
                            <label for="nik"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nomor
                                Induk
                                Kewarganegaraan (NIK)</label>
                            <input type="number" id="nik" name="nik" maxlength="16"
                                value="{{ old('nik', $getData->nik) }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan NIK" required />
                            <span id="nik-warning" style="display: none; color: red;"></span>
                            <span id="nik-countWarning" style="display: none; color: red;"></span>
                        </div>
                        <div>
                            <label for="namaDepan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nama
                                Depan</label>
                            <input type="text" id="namaDepan" name="namaDepan"
                                value="{{ old('namaDepan', $getData->nama_depan) }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Lengkap" required />
                        </div>
                        <div>
                            <label for="namaBelakang"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nama
                                Belakang</label>
                            <input type="text" id="namaBelakang" name="namaBelakang"
                                value="{{ old('namaBelakang', $getData->nama_belakang) }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Lengkap" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div>
                            <label for="tanggalLahir"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Tanggal
                                Lahir</label>
                            <input type="date" id="tanggalLahir" name="tanggalLahir"
                                value="{{ old('tanggalLahir', date('Y-m-d', strtotime($getData->tanggal_lahir))) }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Tanggal Lahir" required />
                        </div>
                        <div>
                            <label for="jenisKelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required-field">Jenis
                                Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" @if (old('jenisKelamin', $getData->jenis_kelamin) == 'Laki-laki') selected @endif>Laki-laki
                                </option>
                                <option value="Perempuan" @if (old('jenisKelamin', $getData->jenis_kelamin) == 'Perempuan') selected @endif>Perempuan
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="statusMenikah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required-field">Status
                                Menikah</label>
                            <select id="statusMenikah" name="statusMenikah"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option disabled selected>Pilih Status Menikah</option>
                                <option value="Belum Kawin" @if (old('statusMenikah', $getData->status_menikah) == 'Belum Kawin') selected @endif>Belum Kawin
                                </option>
                                <option value="Kawin" @if (old('statusMenikah', $getData->status_menikah) == 'Kawin') selected @endif>Kawin</option>
                                <option value="Janda" @if (old('statusMenikah', $getData->status_menikah) == 'Janda') selected @endif>Janda</option>
                                <option value="Duda" @if (old('statusMenikah', $getData->status_menikah) == 'Duda') selected @endif>Duda</option>
                            </select>
                        </div>
                        <div>
                            <label for="namaOrtu"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nama
                                Orang
                                Tua</label>
                            <input type="text" id="namaOrtu" name="namaOrtu"
                                value="{{ old('namaOrtu', $getData->nama_orangtua) }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Orang Tua" required />
                        </div>
                        <div>
                            <label for="noTelepon"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nomor
                                Telepon</label>
                            <input type="number" id="noTelepon" name="noTelepon"
                                value="{{ old('noTelepon', $getData->no_telepon) }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan No. Telepon" required />
                        </div>
                        <div>
                            <label for="agama"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Agama</label>
                            <select id="agama" name="agama"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"required>
                                <option selected disabled>Pilih Agama</option>
                                <option value="Islam" @if (old('agama', $getData->agama) == 'Islam') selected @endif>Islam</option>
                                <option value="Kristen" @if (old('agama', $getData->agama) == 'Kristen') selected @endif>Kristen
                                <option value="Hindu" @if (old('agama', $getData->agama) == 'Hindu') selected @endif>Hindu
                                <option value="Budha" @if (old('agama', $getData->agama) == 'Budha') selected @endif>Budha
                                <option value="Konghucu" @if (old('agama', $getData->agama) == 'Konghucu') selected @endif>Konghucu
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="golDarah"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Golongan
                                Darah</label>
                            <select id="golDarah" name="golDarah"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Golongan Darah</option>
                                <option value="A" @if (old('golDarah', $getData->gol_darah) == 'A') selected @endif>A</option>
                                <option value="B" @if (old('golDarah', $getData->gol_darah) == 'B') selected @endif>B</option>
                                <option value="AB" @if (old('golDarah', $getData->gol_darah) == 'AB') selected @endif>AB</option>
                                <option value="O" @if (old('golDarah', $getData->gol_darah) == 'O') selected @endif>O</option>
                            </select>
                        </div>
                    </div>
                    <hr class=" border-gray-200 dark:border-gray-700 mb-8">
                    <div class="subtitle-large-form mb-8">Alamat</div>
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div>
                            <label for="provinsi"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Provinsi</label>
                            <select id="provinsi" name="provinsi"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            </select>
                        </div>
                        <div>
                            <label for="kota_kab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Kota /
                                Kabupaten</label>
                            <select id="kota_kab" name="kotaKab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            </select>
                        </div>
                        <div>
                            <label for="Kecamatan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Kecamatan</label>
                            <select id="Kecamatan" name="kecamatan"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            </select>
                        </div>
                        <div>
                            <label for="desa_kel"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Kelurahan
                                /
                                Desa</label>
                            <select id="desa_kel" name="desaKel"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            </select>
                        </div>
                    </div>
                    <div class="mb-8">
                        <label for="alamatKTP"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required-field">Alamat
                            Sesuai
                            KTP</label>
                        <textarea id="alamatKTP" rows="4" name="alamatKTP"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Alamat Sesuai KTP" required>{{ $getData->alamat_ktp }}</textarea>
                    </div>
                    <div class="flex items-center mb-8">
                        <input type="hidden" id="checkDomisKtp" name="checkDomisKtp" value="0" required>
                        <input type="checkbox" id="domis_ktp" name="domis_ktp"
                            @if ($getData->alamat_domisili == $getData->alamat_ktp) checked @endif
                            onchange="document.getElementById('checkDomisKtp').value = this.checked ? 1 : 0"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 font-medium text-gray-900 dark:text-gray-300">Ceklis
                            jika Alamat Domisili sama dengan Alamat KTP</label>
                    </div>
                    <div class="mb-8">
                        <label for="alamatDomisili"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Domisili</label>
                        <textarea id="alamatDomisili" name="alamat_domisili" rows="4"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Alamat Domisili">{{ $getData->alamat_domisili }}</textarea>
                    </div>
                    <hr class=" border-gray-200 dark:border-gray-700 mb-8">
                    <div class="subtitle-large-form mb-8">Alergi</div>
                    <div class="grid gap-6 mb-8 md:grid-cols-3">
                        <div>
                            <label for="makanan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Makanan</label>
                            <input type="text" id="makanan" name="makanan" value="{{ $getData->alergi_makanan }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alergi Makanan" />
                        </div>
                        <div>
                            <label for="udara"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Udara</label>
                            <input type="text" id="udara" name="udara" value="{{ $getData->alergi_udara }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alergi Udara" />
                        </div>
                        <div>
                            <label for="obat"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Obat</label>
                            <input type="text" id="obat" name="obat" value="{{ $getData->alergi_obat }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alergi Obat" />
                        </div>
                    </div>
                    <hr class=" border-gray-200 dark:border-gray-700 mb-8">
                    <div class="subtitle-large-form mb-8">Penanggung Jawab</div>
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div>
                            <label for="hubungaPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Penanggung
                                Jawab</label>
                            <select id="hubungaPenanggungJawab" name="hubungaPenanggungJawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected disabled> Pilih Penanggung Jawab</option>
                                <option value="Diri Sendiri" @if ($getData->hubungan_penanggung_jawab == 'Diri Sendiri') selected @endif>Diri
                                    Sendiri
                                <option value="Orang Tua" @if ($getData->hubungan_penanggung_jawab == 'Orang Tua') selected @endif>Orang Tua
                                <option value="Suami/Istri" @if ($getData->hubungan_penanggung_jawab == 'Suami/Istri') selected @endif>Suami/Istri
                                <option value="Anak" @if ($getData->hubungan_penanggung_jawab == 'Anak') selected @endif>Anak
                                <option value="Keluarga" @if ($getData->hubungan_penanggung_jawab == 'Keluarga') selected @endif>Keluarga
                                <option value="Lainnya" @if ($getData->hubungan_penanggung_jawab == 'Lainnya') selected @endif>Lainnya
                            </select>
                        </div>
                        <div>
                            <label for="nikPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">NIK
                                Penanggung
                                Jawab</label>
                            <input type="number" id="nikPenanggungJawab" name="nikPenanggungJawab"
                                value="{{ $getData->nik_penanggung_jawab }}" maxlength="16"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="NIK Penanggung Jawab" required />
                            <span id="nikPenanggungJawab-warning" style="display: none; color: red;"></span>
                            <span id="nikPenanggungJawab-countWarning" style="display: none; color: red;"></span>
                        </div>
                        <div>
                            <label for="namaPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nama
                                Penanggung
                                Jawab</label>
                            <input type="text" id="namaPenanggungJawab" name="namaPenanggungJawab"
                                value="{{ $getData->nama_penanggung_jawab }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama Penanggung Jawab" required />
                        </div>
                        <div>
                            <label for="noPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No. Telepon</label>
                            <input type="number" id="noPenanggungJawab" name="noPenanggungJawab"
                                value="{{ $getData->no_telepon_penanggung_jawab }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="No. Telepon" />
                        </div>
                        <div>
                            <label for="alamatPenanggungJawab"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penanggung
                                Jawab</label>
                            <textarea id="alamatPenanggungJawab" rows="4" name="alamatPenanggungJawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alamat Penanggung Jawab">{{ $getData->alamat_penanggung_jawab }}</textarea>
                        </div>
                        <div>
                            <label for="pekerjaanPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Pekerjaan</label>
                            <input type="text" id="pekerjaanPenanggungJawab" name="pekerjaanPenanggungJawab"
                                value="{{ $getData->pekerjaan_penanggung_jawab }}"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pekerjaan" />
                        </div>
                    </div>

                    <div class="flex justify-end items-start gap-8 self-stretch">
                        <button type="button" class="btn btn-close btn-medium btn-secondary-blue"
                            onclick="window.location.href='{{ route('data-pasien.index') }}'">Batal</button>
                        <button id="submit" type="submit"
                            class="btn btn-submit btn-medium btn-gradient-blue">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- Start Dynamic dependent --}}
<script>
    $(document).ready(function() {
        var ajaxRequest;
        // ------------------------------------ Start Get Province ------------------------------------
        $.ajax({
            type: "GET",
            url: "{{ route('data-pasien.provinces') }}",
            success: function(res) {
                if (res) {
                    $("#provinsi")
                        .empty()
                        .append(
                            "<option selected disabled>Pilih Provinsi</option>"
                        );
                    $("#kota_kab")
                        .empty()
                        .append(
                            "<option selected disabled>Pilih Kota / Kabupaten</option>"
                        );
                    $("#Kecamatan")
                        .empty()
                        .append("<option selected disabled>Pilih Kecamatan</option>");
                    $("#desa_kel")
                        .empty()
                        .append(
                            "<option selected disabled>Pilih Kelurahan / Desa</option>"
                        );
                    $.each(res, function(id, value) {
                        // get old selected province
                        var selected = "{{ $getData->provinsi }}";
                        if (selected == value.id) {
                            $("#provinsi").append(
                                '<option value="' +
                                value.id +
                                '" selected>' +
                                value.name +
                                "</option>"
                            );
                        } else {
                            $("#provinsi").append(
                                '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                            );
                        }
                    });
                } else {
                    $("#provinsi").empty();
                }
            },
        });
        // ------------------------------------ End Get Province ------------------------------------

        // ------------------------------------ Start Province ------------------------------------
        var selectedProv = "{{ $getData->provinsi }}";
        if (selectedProv) {
            ajaxRequest = $.ajax({
                type: "GET",
                url: "{{ route('data-pasien.cities') }}?provinsi_id=" + selectedProv,
                success: function(res) {
                    if (res) {
                        $("#kota_kab")
                            .empty()
                            .append(
                                "<option selected disabled>Pilih Kota / Kabupaten</option>"
                            );
                        $.each(res, function(id, value) {
                            // get old selected city
                            var selected = "{{ $getData->kabupaten }}";
                            if (selected == value.id) {
                                $("#kota_kab").append(
                                    '<option value="' +
                                    value.id +
                                    '" selected>' +
                                    value.name +
                                    "</option>"
                                );
                            } else {
                                $("#kota_kab").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            }
                        });
                    } else {
                        $("#kota_kab").empty();
                    }
                },
            });
        }
        $("#provinsi").change(function() {
            if (ajaxRequest) {
                ajaxRequest.abort();
                // Set the following dropdown to null
                $("#kota_kab")
                    .empty()
                    .append(
                        "<option selected disabled>Pilih Kota / Kabupaten</option>"
                    );
                $("#Kecamatan")
                    .empty()
                    .append("<option selected disabled>Pilih Kecamatan</option>");
                $("#desa_kel")
                    .empty()
                    .append(
                        "<option selected disabled>Pilih Kelurahan / Desa</option>"
                    );
            }

            // get from id_prov
            var selectedCity = "{{ $getData->kabupaten }}";
            if (selectedCity) {
                ajaxRequest = $.ajax({
                    type: "GET",
                    url: "{{ route('data-pasien.cities') }}?provinsi_id=" +
                        selectedProv,
                    success: function(res) {
                        if (res) {
                            $("#kota_kab")
                                .empty()
                                .append(
                                    "<option selected disabled>Pilih Kota / Kabupaten</option>"
                                );
                            $.each(res, function(id, value) {
                                if (selectedCity == value.id) {
                                    $("#kota_kab").append(
                                        '<option value="' +
                                        value.id +
                                        '" selected>' +
                                        value.name +
                                        "</option>"
                                    );
                                } else {
                                    $("#kota_kab").append(
                                        '<option value="' +
                                        value.id +
                                        '">' +
                                        value.name +
                                        "</option>"
                                    );
                                }
                            });
                        } else {
                            $("#kota_kab").empty();
                        }
                    },
                });
            }

            var provinsiID = $(this).val();
            if (provinsiID) {
                ajaxRequest = $.ajax({
                    type: "GET",
                    url: "{{ route('data-pasien.cities') }}?provinsi_id=" +
                        provinsiID,
                    success: function(res) {
                        if (res) {
                            $("#kota_kab")
                                .empty()
                                .append(
                                    "<option selected disabled>Pilih Kota / Kabupaten</option>"
                                );
                            $.each(res, function(id, value) {
                                $("#kota_kab").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            });
                        } else {
                            $("#kota_kab").empty();
                        }
                    },
                });
            } else {
                $("#kota_kab").empty();
            }
        });
        // ------------------------------------ End Province ------------------------------------

        // ------------------------------------ Start City ------------------------------------
        var selectedCity = "{{ $getData->kabupaten }}";
        if (selectedCity) {
            ajaxRequest = $.ajax({
                type: "GET",
                url: "{{ route('data-pasien.districts') }}?kota_kab_id=" +
                    selectedCity,
                success: function(res) {
                    if (res) {
                        $("#Kecamatan")
                            .empty()
                            .append(
                                "<option selected disabled>Pilih Kecamatan</option>"
                            );
                        $.each(res, function(key, value) {
                            // get old selected district
                            var selected = "{{ $getData->kecamatan }}";
                            if (selected == value.id) {
                                $("#Kecamatan").append(
                                    '<option value="' +
                                    value.id +
                                    '" selected>' +
                                    value.name +
                                    "</option>"
                                );
                            } else {
                                $("#Kecamatan").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            }
                        });
                    } else {
                        $("#Kecamatan").empty();
                    }
                },
            });
        }
        $("#kota_kab").change(function() {
            if (ajaxRequest) {
                ajaxRequest.abort();
                // Set the following dropdown to null
                $("#Kecamatan")
                    .empty()
                    .append("<option selected disabled>Pilih Kecamatan</option>");
                $("#desa_kel")
                    .empty()
                    .append(
                        "<option selected disabled>Pilih Kelurahan / Desa</option>"
                    );
            }

            var kotaKabID = $(this).val();
            if (kotaKabID) {
                ajaxRequest = $.ajax({
                    type: "GET",
                    url: "{{ route('data-pasien.districts') }}?kota_kab_id=" +
                        kotaKabID,
                    success: function(res) {
                        if (res) {
                            $("#Kecamatan")
                                .empty()
                                .append(
                                    "<option selected disabled>Pilih Kecamatan</option>"
                                );
                            $.each(res, function(key, value) {
                                $("#Kecamatan").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            });
                        } else {
                            $("#Kecamatan").empty();
                        }
                    },
                });
            } else {
                $("#Kecamatan").empty();
            }
        });
        // ------------------------------------ End City ------------------------------------

        // ------------------------------------ Start District ------------------------------------
        var selectedDistrict = "{{ $getData->kecamatan }}";
        if (selectedDistrict) {
            ajaxRequest = $.ajax({
                type: "GET",
                url: "{{ route('data-pasien.villages') }}?kecamatan_id=" +
                    selectedDistrict,
                success: function(res) {
                    if (res) {
                        $("#desa_kel")
                            .empty()
                            .append(
                                "<option selected disabled>Pilih Kelurahan / Desa</option>"
                            );
                        $.each(res, function(key, value) {
                            // get old selected village
                            var selected = "{{ $getData->kelurahan }}";
                            if (selected == value.id) {
                                $("#desa_kel").append(
                                    '<option value="' +
                                    value.id +
                                    '" selected>' +
                                    value.name +
                                    "</option>"
                                );
                            } else {
                                $("#desa_kel").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            }
                        });
                    } else {
                        $("#desa_kel").empty();
                    }
                },
            });
        }
        $("#Kecamatan").change(function() {
            if (ajaxRequest) {
                ajaxRequest.abort();
                // Set the following dropdown to null
                $("#desa_kel")
                    .empty()
                    .append(
                        "<option selected disabled>Pilih Kelurahan / Desa</option>"
                    );
            }

            var kecamatanID = $(this).val();
            if (kecamatanID) {
                ajaxRequest = $.ajax({
                    type: "GET",
                    url: "{{ route('data-pasien.villages') }}?kecamatan_id=" +
                        kecamatanID,
                    success: function(res) {
                        if (res) {
                            $("#desa_kel")
                                .empty()
                                .append(
                                    "<option selected disabled>Pilih Kelurahan / Desa</option>"
                                );
                            $.each(res, function(key, value) {
                                $("#desa_kel").append(
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                                );
                            });
                        } else {
                            $("#desa_kel").empty();
                        }
                    },
                });
            } else {
                $("#desa_kel").empty();
            }
        });
        // ------------------------------------ End District ------------------------------------
    });
</script>
{{-- End Dynamic dependent --}}

@push('page-scripts')
    @push('page-scripts')
        {{-- <script src="assets/plugins/datatables/datatables.min.js"></script> --}}
    @endpush
