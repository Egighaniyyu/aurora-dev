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
                <form action="#" class="w-full">
                    @csrf
                    <div class="subtitle-large-form mb-8">Data Diri</div>
                    <div class="mb-8">
                        <label for="rekam_medis" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Rekam
                            Medis</label>
                        <input type="text" id="rekam_medis"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="01-12-53" required />
                    </div>
                    <div class="mb-8">
                        <label for="no_bpjs" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No.
                            BPJS</label>
                        <input type="text" id="no_bpjs"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan No. BPJS" />
                    </div>
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div>
                            <label for="nik" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nomor
                                Induk
                                Kewarganegaraan (NIK)</label>
                            <input type="text" id="nik"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan NIK" />
                        </div>
                        <div>
                            <label for="nama" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nama
                                Lengkap</label>
                            <input type="text" id="nama"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Nama Lengkap" />
                        </div>
                        <div>
                            <label for="tgl_lahir"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Tanggal
                                Lahir</label>
                            <input type="date" id="tgl_lahir"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Tanggal Lahir" />
                        </div>
                        <div>
                            <label for="jenis_kelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="jenis_kelamin"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="status_menikah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Menikah</label>
                            <select id="status_menikah"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Status Menikah</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="nama_ortu" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nama
                                Orang
                                Tua</label>
                            <input type="text" id="nama_ortu"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Orang Tua" />
                        </div>
                        <div>
                            <label for="no_tlp" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nomor
                                Telepon</label>
                            <input type="text" id="no_tlp"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan No. Telepon" />
                        </div>
                        <div>
                            <label for="agama"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Agama</label>
                            <select id="agama"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label for="gol_darah"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Golongan
                                Darah</label>
                            <input type="text" id="gol_darah"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Golongan Darah" />
                        </div>
                    </div>
                    <hr class=" border-gray-200 dark:border-gray-700 mb-8">
                    <div class="subtitle-large-form mb-8">Alamat</div>
                    <div class="grid gap-6 mb-8 md:grid-cols-2">

                        <div>
                            <label for="provinsi"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Provinsi</label>
                            <select id="provinsi"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Provinsi</option>
                                <option value="Aceh">Aceh</option>
                                <option value="Medan">Medan</option>

                            </select>
                        </div>
                        <div>
                            <label for="kota_kab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Kota /
                                Kabupaten</label>
                            <select id="kota_kab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Kota / Kabupaten</option>
                                <option value="Aceh">Aceh</option>
                                <option value="Medan">Medan</option>

                            </select>
                        </div>
                        <div>
                            <label for="Kecamatan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Kecamatan</label>
                            <select id="Kecamatan"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Kecamatan</option>
                                <option value="Aceh">Aceh</option>
                                <option value="Medan">Medan</option>

                            </select>
                        </div>
                        <div>
                            <label for="desa_kel"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Makanan</label>
                            <select id="desa_kel"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Makanan</option>
                                <option value="Aceh">Aceh</option>
                                <option value="Medan">Medan</option>

                            </select>
                        </div>
                    </div>
                    <div class="mb-8">

                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Sesuai
                            KTP</label>
                        <textarea id="alamat" rows="4"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Alamat Sesuai KTP"></textarea>

                    </div>
                    <div class="flex items-center mb-8">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 font-medium text-gray-900 dark:text-gray-300">Ceklis
                            jika Alamat Domisili sama dengan Alamat KTP</label>
                    </div>
                    <div class="mb-8">

                        <label for="alamat_domisili"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Domisili</label>
                        <textarea id="alamat_domisili" rows="4"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Alamat Domisili"></textarea>

                    </div>
                    <hr class=" border-gray-200 dark:border-gray-700 mb-8">
                    <div class="subtitle-large-form mb-8">Alergi</div>
                    <div class="grid gap-6 mb-8 md:grid-cols-3">
                        <div>
                            <label for="makanan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Makanan</label>
                            <select id="makanan"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih</option>
                                <option value="Mie">Mie</option>
                                <option value="Telur">Telur</option>

                            </select>
                        </div>

                        <div>
                            <label for="udara"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Udara</label>
                            <select id="udara"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih</option>
                                <option value="Panas">Panas</option>
                                <option value="Dingin">Dingin</option>

                            </select>
                        </div>
                        <div>
                            <label for="obat"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Obat</label>
                            <input type="text" id="obat"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Obat" />
                        </div>
                    </div>
                    <hr class=" border-gray-200 dark:border-gray-700 mb-8">
                    <div class="subtitle-large-form mb-8">Penanggung Jawab</div>
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div>
                            <label for="penanggung_jawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Penanggung
                                Jawab</label>
                            <select id="penanggung_jawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Diri Sendiri" selected>Diri Sendiri</option>
                                <option value="Orang Tua">Orang Tua</option>

                            </select>
                        </div>
                        <div>
                            <label for="nik_penanggung_jawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">NIK Penanggung
                                Jawab</label>
                            <input type="text" id="nik_penanggung_jawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="NIK Penanggung Jawab" />
                        </div>
                        <div>
                            <label for="nama_penanggung_jawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nama Penanggung
                                Jawab</label>
                            <input type="text" id="nama_penanggung_jawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama Penanggung Jawab" />
                        </div>
                        <div>
                            <label for="no_penanggung_jawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No. Telepon</label>
                            <input type="text" id="no_penanggung_jawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="No. Telepon" />
                        </div>
                        <div>
                            <label for="alamat_penanggung_jawab"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penanggung
                                Jawab</label>
                            <textarea id="alamat_penanggung_jawab" rows="4"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Alamat Penanggung Jawab"></textarea>
                        </div>
                        <div>
                            <label for="Pekerjaan_penanggung_jawab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Pekerjaan</label>
                            <input type="text" id="Pekerjaan_penanggung_jawab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pekerjaan" />
                        </div>
                    </div>

                    <div class="flex justify-end items-start gap-8 self-stretch">
                        <button class="btn btn-medium btn-secondary-blue">Batal</button>
                        <button type="submit" class="btn btn-medium btn-gradient-blue">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- <script src="assets/plugins/datatables/datatables.min.js"></script> --}}
@endpush
