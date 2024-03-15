@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title', 'Dashboard')

@push('page-css')
    {{-- <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css"> --}}
@endpush

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 flex flex-col md:flex-row md:gap-4">
            <div class="w-full md:w-8/12 flex flex-col gap-8">
                {{-- greetings --}}
                <div class="flex p-8 flex-col items-start gap-8 bg-white rounded-[32px]">
                    <div class="title-card">Selamat Datang, Resepsionis</div>
                    <div class="card-greetings">
                        <img src="{{ asset('assets/img/nurse.svg') }}" alt="nurse">
                        <div class="flex flex-col items-start gap-8">
                            <div class="flex flex-col items-start gap-3">
                                <div class="text-[32px] font-medium leading-9 text-white">Antrian Pasien</div>
                                <div class="text-sm font-normal text-white">Klik button di bawah untuk membuat antrian
                                    pasien baru</div>
                            </div>
                            <a href="#" class="btn btn-medium btn-white">Antrian Pasien</a>
                        </div>
                    </div>
                </div>
                {{-- end greetings --}}
                {{-- card data --}}
                <div class="flex flex-row gap-8">
                    <div
                        class="w-full flex flex-col p-6 justify-center items-start gap-10 self-stretch card-data-potrait rounded-[20px]">
                        <div class="p-2 bg-white rounded-xl">
                            <img src="{{ asset('assets/img/care.svg') }}" alt="terdaftar">
                        </div>
                        <div class="flex flex-col items-start gap-2 self-stretch">
                            <div class="text-[40px] font-semibold leading-[44px] text-white">25</div>
                            <div class="text-base font-medium left-[22.4px] text-white">Sudah Terdaftar</div>
                        </div>
                    </div>
                    <div
                        class="w-full flex flex-col p-6 justify-center items-start gap-10 self-stretch card-data-potrait rounded-[20px]">
                        <div class="p-2 bg-white rounded-xl">
                            <img src="{{ asset('assets/img/medical-equipment.svg') }}" alt="belum terdaftar">
                        </div>
                        <div class="flex flex-col items-start gap-2 self-stretch">
                            <div class="text-[40px] font-semibold leading-[44px] text-white">25</div>
                            <div class="text-base font-medium left-[22.4px] text-white">Belum Terdaftar</div>
                        </div>
                    </div>
                    <div
                        class="w-full flex flex-col p-6 justify-center items-start gap-10 self-stretch card-data-potrait rounded-[20px]">
                        <div class="p-2 bg-white rounded-xl">
                            <img src="{{ asset('assets/img/health.svg') }}" alt="sudah dilayani">
                        </div>
                        <div class="flex flex-col items-start gap-2 self-stretch">
                            <div class="text-[40px] font-semibold leading-[44px] text-white">25</div>
                            <div class="text-base font-medium left-[22.4px] text-white">Sudah Dilayani</div>
                        </div>
                    </div>
                </div>
                {{-- end card data --}}
                {{-- kunjungan pasiend --}}
                <div class="flex p-8 flex-col items-start gap-8 bg-white rounded-[32px]">
                    <div class="flex justify-between items-start self-stretch">
                        <div class="title-card">Kunjungan Pasien</div>

                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mingguan</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bulanan</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="w-full md:w-4/12">
                <div class="flex p-8 flex-col items-start gap-8 bg-white rounded-[32px]">
                    <div class="title-card">Selamat Datang, Resepsionis</div>
                    <div class="card-greetings">
                        <img src="{{ asset('assets/img/nurse.svg') }}" alt="nurse">
                        <div class="flex flex-col items-start gap-8">
                            <div class="flex flex-col items-start gap-3">
                                <div class="text-[32px] font-medium leading-9 text-white">Antrian Pasien</div>
                                <div class="text-sm font-normal text-white">Klik button di bawah untuk membuat antrian
                                    pasien baru</div>
                            </div>
                            <a href="#" class="btn btn-medium btn-white">Antrian Pasien</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- <script src="assets/plugins/datatables/datatables.min.js"></script> --}}
@endpush
