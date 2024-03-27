@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title', 'Dashboard')

@push('page-css')
    {{-- <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css"> --}}
@endpush

@section('content')
    <div class="p-4 sm:ml-64">
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
                <form action="{{ route('data-pasien.store') }}" method="POST" class="w-full">
                    @csrf
                    <div class="subtitle-large-form mb-8">Data Diri</div>
                    <div class="mb-8">
                        <label for="noRm"
                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">No. Reka
                            Medis</label>
                        <input type="text" id="noRm" name="noRm"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $newNoRM }}" readonly required />
                    </div>
                    <div class="mb-8">
                        <label for="no_bpjs" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No.
                            BPJS</label>
                        <input type="number" id="no_bpjs"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan No. BPJS" />
                    </div>
                    <div class="grid gap-6 mb-8 md:grid-cols-3">
                        <div>
                            <label for="nik"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nomor
                                Induk
                                Kewarganegaraan (NIK)</label>
                            <input type="number" id="nik" name="nik"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan NIK" required />
                        </div>
                        <div>
                            <label for="namaDepan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nama
                                Depan</label>
                            <input type="text" id="namaDepan" name="namaDepan"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Lengkap" required />
                        </div>
                        <div>
                            <label for="namaBelakang"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nama
                                Belakang</label>
                            <input type="text" id="namaBelakang" name="namaBelakang"
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
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
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
                                <option value="1">Belum Kawin</option>
                                <option value="2">Kawin</option>
                                <option value="3">Janda</option>
                                <option value="4">Duda</option>
                            </select>
                        </div>
                        <div>
                            <label for="namaOrtu"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nama
                                Orang
                                Tua</label>
                            <input type="text" id="namaOrtu" name="namaOrtu"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Orang Tua" required />
                        </div>
                        <div>
                            <label for="noTelepon"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nomor
                                Telepon</label>
                            <input type="number" id="noTelepon" name="noTelepon"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan No. Telepon" required />
                        </div>
                        <div>
                            <label for="agama"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Agama</label>
                            <select id="agama" name="agama"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"required>
                                <option selected disabled>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label for="golDarah"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Golongan
                                Darah</label>
                            <select id="golDarah" name="golDarah"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Golongan Darah</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
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
                                <option selected disabled>Pilih Provinsi</option>
                                @forelse ($getProvince as $prov)
                                    <option value="{{ $prov->id }}">{{ $prov->name }}
                                    </option>
                                @empty
                                    <option value="">Data tidak ditemukan</option>
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label for="kota_kab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Kota /
                                Kabupaten</label>
                            <select id="kota_kab" name="kotaKab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected disabled>Pilih Kota / Kabupaten</option>
                            </select>
                        </div>
                        <div>
                            <label for="Kecamatan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Kecamatan</label>
                            <select id="Kecamatan" name="kecamatan"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option selected disabled>Pilih Kecamatan</option>
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
                                <option selected disabled>Pilih Kelurahan / Desa</option>
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
                            placeholder="Masukan Alamat Sesuai KTP" required></textarea>

                    </div>
                    <div class="flex items-center mb-8">
                        <input type="hidden" id="checkDomisKtp" name="checkDomisKtp" value="0" required>
                        <input type="checkbox" id="domis_ktp"
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
                            placeholder="Masukan Alamat Domisili"></textarea>

                    </div>
                    <hr class=" border-gray-200 dark:border-gray-700 mb-8">
                    <div class="subtitle-large-form mb-8">Alergi</div>
                    <div class="grid gap-6 mb-8 md:grid-cols-3">
                        <div>
                            <label for="makanan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Makanan</label>
                            <input type="text" id="makanan" name="makanan"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alergi Makanan" />
                        </div>
                        <div>
                            <label for="udara"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Udara</label>
                            <input type="text" id="udara" name="udara"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alergi Udara" />
                        </div>
                        <div>
                            <label for="obat"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Obat</label>
                            <input type="text" id="obat" name="obat"
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
                                <option value="Diri Sendiri">Diri Sendiri</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Suami/Istri">Suami/Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Keluarga">Keluarga</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label for="nikPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">NIK
                                Penanggung
                                Jawab</label>
                            <input type="text" id="nikPenanggungJawab" name="nikPenanggungJawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="NIK Penanggung Jawab" required />
                        </div>
                        <div>
                            <label for="namaPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block required-field">Nama
                                Penanggung
                                Jawab</label>
                            <input type="text" id="namaPenanggungJawab" name="namaPenanggungJawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama Penanggung Jawab" required />
                        </div>
                        <div>
                            <label for="noPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No. Telepon</label>
                            <input type="text" id="noPenanggungJawab" name="noPenanggungJawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="No. Telepon" />
                        </div>
                        <div>
                            <label for="alamatPenanggungJawab"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penanggung
                                Jawab</label>
                            <textarea id="alamatPenanggungJawab" rows="4" name="alamatPenanggungJawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alamat Penanggung Jawab"></textarea>
                        </div>
                        <div>
                            <label for="pekerjaanPenanggungJawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Pekerjaan</label>
                            <input type="text" id="pekerjaanPenanggungJawab" name="pekerjaanPenanggungJawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pekerjaan" />
                        </div>
                    </div>

                    <div class="flex justify-end items-start gap-8 self-stretch">
                        <button type="button" class="btn btn-medium btn-secondary-blue"
                            onclick="window.location.href='{{ route('data-pasien.index') }}'">Batal</button>
                        <button type="submit" class="btn btn-medium btn-gradient-blue">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#domis_ktp").change(function() {
            if (this.checked) {
                // Copy value from alamat ktp to alamat domisili
                $("#alamatDomisili").val($("#alamatKTP").val());
                $("#alamatDomisili").prop("disabled", true);
            } else {
                $("#alamatDomisili").prop("disabled", false);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize Select2 on your select elements
        // $("#provinsi, #kota_kab, #Kecamatan, #desa_kel").select2();
        var ajaxRequest;

        $("#provinsi").change(function() {
            if (ajaxRequest) {
                ajaxRequest.abort();
                // Set the following dropdown to null
                $("#kota_kab")
                    .empty()
                    .append("<option selected disabled>Pilih Kabupaten</option>");
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
    });
</script>
@push('page-scripts')
    @push('page-scripts')
        {{-- <script src="assets/plugins/datatables/datatables.min.js"></script> --}}
    @endpush
