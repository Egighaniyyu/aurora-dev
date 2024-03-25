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
                            type="button">Pilih Waktu <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
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
                    <div id="chart_kunjungan" class="w-full"></div>
                </div>
            </div>
            <div class="w-full md:w-4/12 flex flex-col gap-8">
                <div class="flex p-8 flex-col items-start gap-8 bg-white rounded-[32px]">
                    <div class="title-card">Jenis Pasien</div>
                    <div id="chart_jenis_pasien" class="w-full m-auto"></div>
                </div>

                <div class="flex p-8 flex-col items-start gap-8 bg-white rounded-[32px]">
                    <div class="title-card">Top 5 ICD</div>
                    <div id="chart_icd" class="w-full m-auto"></div>
                </div>

                <div class="flex p-8 flex-col items-start gap-8 bg-white rounded-[32px]">
                    <div class="title-card">Daftar Poli</div>
                    <div class="flex flex-col gap-7 items-center self-stretch">
                        <div class="flex flex-row gap-5 w-full">
                            <div class="wrapper-icon-poli"><img src="{{ asset('assets/img/poli-umum.svg') }}"
                                    alt="poli umum"></div>
                            <div class="flex flex-col gap-2">
                                <div class="text-base font-medium leading-[22.4px] text-[#212121]">Poli Umum</div>
                                <div class="flex flex-row justify-center items-center gap-2">
                                    <div class="text-sm leading-[19.6px] text-[#D9D9D9]">09.30 - 13.30</div>
                                    <div class="w-[6px] h-[6px] rounded-full bg-[#D9D9D9]"></div>
                                    <div class="text-sm leading-[19.6px] text-[#D9D9D9]">30 Pasien</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row gap-5 w-full">
                            <div class="wrapper-icon-poli"><img src="{{ asset('assets/img/poli-gigi.svg') }}"
                                    alt="poli gigi"></div>
                            <div class="flex flex-col gap-2">
                                <div class="text-base font-medium leading-[22.4px] text-[#212121]">Poli Gigi</div>
                                <div class="flex flex-row justify-center items-center gap-2">
                                    <div class="text-sm leading-[19.6px] text-[#D9D9D9]">09.30 - 13.30</div>
                                    <div class="w-[6px] h-[6px] rounded-full bg-[#D9D9D9]"></div>
                                    <div class="text-sm leading-[19.6px] text-[#D9D9D9]">32 Pasien</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row gap-5 w-full">
                            <div class="wrapper-icon-poli"><img src="{{ asset('assets/img/poli-paru.svg') }}"
                                    alt="poli paru"></div>
                            <div class="flex flex-col gap-2">
                                <div class="text-base font-medium leading-[22.4px] text-[#212121]">Poli Paru</div>
                                <div class="flex flex-row justify-center items-center gap-2">
                                    <div class="text-sm leading-[19.6px] text-[#D9D9D9]">09.30 - 13.30</div>
                                    <div class="w-[6px] h-[6px] rounded-full bg-[#D9D9D9]"></div>
                                    <div class="text-sm leading-[19.6px] text-[#D9D9D9]">11 Pasien</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // chart kunjungan pasien
        var options_kunjungan = {
            series: [{
                name: 'Umum',
                data: [31, 40, 28, 51, 42, 80, 90]
            }, {
                name: 'BPJS',
                data: [11, 32, 45, 32, 34, 52, 41]
            }, {
                name: 'Rujukan',
                data: [20, 30, 40, 31, 33, 45, 50]
            }],
            colors: ['#0EB0F1', '#FE8947', '#FED575'],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "3/11/2024",
                    "3/12/2024",
                    "3/13/2024",
                    "3/14/2024",
                    "3/15/2024",
                    "3/16/2024",
                    "3/17/2024",
                ]
            },
            tooltip: {
                x: {
                    format: 'dd MMM yyyy'
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
            },

        };

        var chart_kunjungan = new ApexCharts(document.querySelector("#chart_kunjungan"), options_kunjungan);
        chart_kunjungan.render();
        // end chart kunjungan pasien

        // chart jenis pasien
        var options_jenis_pasien = {
            series: [44, 55],
            labels: ['BPJS', 'Umum'],
            colors: ['#0EB0F1', '#FE8947'],
            chart: {
                height: 300,
                type: 'donut',
            },
            plotOptions: {
                pie: {
                    startAngle: -90,
                    endAngle: 270,
                    donut: {
                        size: "50%"
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'gradient',
            },
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        // width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart_jenis_pasien = new ApexCharts(document.querySelector("#chart_jenis_pasien"), options_jenis_pasien);
        chart_jenis_pasien.render();
        // end chart jenis pasien

        // chart icd
        var options_icd = {
            series: [{
                data: [400, 430, 448, 470, 540]
            }],
            colors: ['#0EB0F1'],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Z00', 'J00', 'A28', 'X00', 'F00'],
            }
        };

        var chart_icd = new ApexCharts(document.querySelector("#chart_icd"), options_icd);
        chart_icd.render();
        // end chart icd
    </script>
@endpush
