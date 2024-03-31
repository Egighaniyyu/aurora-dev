@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title', 'Data Pasien')

@push('page-css')
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Data
                                Pasien</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="mt-4 p-8 w-full bg-white rounded-[32px]">
                <div class="title-card mb-6">Data Pasien</div>

                <div class="flex flex-row w-full justify-between mb-11">
                    <form action="{{ route('data-pasien.index') }}" method="GET">
                        {{-- @csrf --}}
                        <label for="search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative w-96">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="search" name="search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari dengan Nama, NIK, Atau No. RM" value="{{ request('search') }}" />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                        </div>
                    </form>

                    <a href="{{ route('data-pasien.create') }}" class="btn btn-small btn-gradient-blue"><i
                            data-feather="plus" class="w-5 h-5 text-white"></i> Tambah
                        Data</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    No. Reka Medis
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    NIK
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    No BPJS
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    Nama Pasien
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    Tanggal Lahir
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    No. Telepon
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($getData as $pasien)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->no_rm }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->nik }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->no_bpjs ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->nama_lengkap }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->tanggal_lahir }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->jenis_kelamin }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->id_no_telepon }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $pasien->alamat_domisili }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('data-pasien.edit', $pasien->uuid) }}"
                                            class="btn btn-small btn-gradient-blue">Lihat Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center p-4">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- pagination --}}
                @if ($getData->hasPages())
                    <div class="flex justify-between bg-gray-200 p-4 rounded-md space-x-4">
                        <div class="text-gray-700">
                            Showing {{ $getData->firstItem() }} to {{ $getData->lastItem() }} of {{ $getData->total() }}
                        </div>
                        <!-- Previous Page Link -->
                        @if (!$getData->onFirstPage())
                            <a href="{{ $getData->previousPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 hover:bg-gray-300 rounded-md">
                                Previous
                            </a>
                        @endif

                        <!-- Pagination Elements -->
                        <div class="flex space-x-2">
                            @foreach (range(1, $getData->lastPage()) as $i)
                                @if ($i == $getData->currentPage())
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-blue-500 border border-blue-500 cursor-default leading-5 rounded-md">{{ $i }}</span>
                                @else
                                    <a href="{{ $getData->url($i) }}"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 hover:bg-gray-300 rounded-md">
                                        {{ $i }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <!-- Next Page Link -->
                        @if ($getData->hasMorePages())
                            <a href="{{ $getData->nextPageUrl() }}"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 hover:bg-gray-300 rounded-md">
                                Next
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
@endpush
