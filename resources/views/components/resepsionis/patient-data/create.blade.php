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
                        <label for="no_rm" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No. Reka
                            Medis</label>
                        <input type="text" id="no_rm"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $newNoRM }}" readonly />
                    </div>
                    <div class="mb-8">
                        <label for="no_bpjs" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">No.
                            BPJS</label>
                        <input type="number" id="no_bpjs"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan No. BPJS" />
                    </div>
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div>
                            <label for="nik" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Nomor
                                Induk
                                Kewarganegaraan (NIK)</label>
                            <input type="number" id="nik"
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
                                <option disabled selected>Pilih Jenis Kelamin</option>
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
                                <option disabled selected>Pilih Status Menikah</option>
                                <option value="1">Belum Kawin</option>
                                <option value="2">Kawin</option>
                                <option value="3">Janda</option>
                                <option value="4">Duda</option>
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
                            <input type="number" id="no_tlp"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan No. Telepon" />
                        </div>
                        <div>
                            <label for="agama"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Agama</label>
                            <select id="agama"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Agama</option>
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
                            <select id="gol_darah"
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
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Provinsi</label>
                            <select id="provinsi" name="provinsi"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Provinsi</option>
                                @forelse ($province as $prov)
                                    <option value="{{ $prov['id'] }}">{{ $prov['name'] }}</option>
                                @empty
                                    <option value="">Data tidak ditemukan</option>
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label for="kota_kab"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Kota /
                                Kabupaten</label>
                            <select id="kota_kab" name="kota_kab"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Kota / Kabupaten</option>
                            </select>
                        </div>
                        <div>
                            <label for="Kecamatan"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Kecamatan</label>
                            <select id="Kecamatan" name="Kecamatan"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div>
                            <label for="desa_kel"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Kelurahan /
                                Desa</label>
                            <select id="desa_kel" name="desa_kel"
                                class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Kelurahan / Desa</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-8">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Sesuai
                            KTP</label>
                        <textarea id="alamat" rows="4" name="alamat"
                            class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukan Alamat Sesuai KTP"></textarea>

                    </div>
                    <div class="flex items-center mb-8">
                        <input type="hidden" id="checkDomisKtp" name="checkDomisKtp" value="0">
                        <input type="checkbox" id="domis_ktp"
                            onchange="document.getElementById('checkDomisKtp').value = this.checked ? 1 : 0"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 font-medium text-gray-900 dark:text-gray-300">Ceklis
                            jika Alamat Domisili sama dengan Alamat KTP</label>
                    </div>
                    <div class="mb-8">
                        <label for="alamat_domisili"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Domisili</label>
                        <textarea id="alamat_domisili" name="alamat_domisili" rows="4"
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#domis_ktp').change(function() {
            if (this.checked) {
                $('#alamat_domisili').val($('#alamat').val());
                $('#alamat_domisili').prop('disabled', true);
            } else {
                $('#alamat_domisili').prop('disabled', false);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var provinsiID = $(this).val();
            if (provinsiID) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('data-pasien.cities') }}?provinsi_id=" + provinsiID,
                    success: function(res) {
                        if (res) {
                            $("#kota_kab").empty();
                            $("#kota_kab").append(
                                '<option selected disabled>Pilih Kota / Kabupaten</option>'
                            );
                            $.each(res, function(id, value) {
                                $("#kota_kab").append('<option value="' + value.id +
                                    '">' + value.name +
                                    '</option>');
                            });
                        } else {
                            $("#kota_kab").empty();
                        }
                    }
                });
            } else {
                $("#kota_kab").empty();
            }
        });
    });

    $(document).ready(function() {
        $('#kota_kab').change(function() {
            var kotaKabID = $(this).val();
            if (kotaKabID) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('data-pasien.districts') }}?kota_kab_id=" + kotaKabID,
                    success: function(res) {
                        if (res) {
                            $("#Kecamatan").empty();
                            $("#Kecamatan").append('<option>Pilih Kecamatan</option>');
                            $.each(res, function(key, value) {
                                $("#Kecamatan").append('<option value="' + value
                                    .id +
                                    '">' + value.name +
                                    '</option>');
                            });

                        } else {
                            $("#Kecamatan").empty();
                        }
                    }
                });
            } else {
                $("#Kecamatan").empty();
            }
        });
    });

    $(document).ready(function() {
        $('#Kecamatan').change(function() {
            var kecamatanID = $(this).val();
            if (kecamatanID) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('data-pasien.villages') }}?kecamatan_id=" + kecamatanID,
                    success: function(res) {
                        if (res) {
                            $("#desa_kel").empty();
                            $("#desa_kel").append(
                                '<option>Pilih Kelurahan / Desa</option>');
                            $.each(res, function(key, value) {
                                $("#desa_kel").append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        } else {
                            $("#desa_kel").empty();
                        }
                    }
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
