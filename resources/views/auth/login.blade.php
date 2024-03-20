@extends('layouts.login-template')

{{-- apabila 1 baris --}}
@section('title', 'Login')

@push('page-css')
    {{-- <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css"> --}}
@endpush

@section('content')
    <div class="container-login h-full">
        <div class="flex flex-col">
            <div class="mb-8">
                <img src="{{ asset('../assets/img/logo.svg') }}" alt="logo">
            </div>
            <div class="mb-5">
                <div class="text-[32px] font-medium leading-[38.4px] text-[#212121]">
                    Selamat Datang Kembali
                </div>
            </div>
            <div class="mb-8">
                <div class="text-base leading-[22.4px] text-[#8A93A1]">Kami dengan senang hati menyambut Anda kembali.Silakan
                    masukkan informasi login Anda untuk mengakses akun Anda.</div>
            </div>
            <div class="mb-8">
                <label for="username_email" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Username
                    atau
                    Email</label>
                <input type="text" id="username_email"
                    class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan Username atau Email" required />
            </div>
            <div class="mb-8">
                <label for="password" class="mb-2 text-sm font-medium text-gray-900 dark:text-white block">Masukan
                    Password</label>
                <input type="password" id="password"
                    class="bg-[#f2f2f2] border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-5 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukan Password" required />
            </div>
            <a href="#" class="btn btn-medium btn-gradient-blue">Masuk</a>
        </div>

    </div>
@endsection

@push('page-scripts')
    {{-- <script src="assets/plugins/datatables/datatables.min.js"></script> --}}
@endpush
