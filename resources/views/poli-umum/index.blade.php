@extends('layouts.master')

{{-- apabila 1 baris --}}
@section('title', 'Dashboard')

@push('page-css')
    {{-- <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css"> --}}
@endpush

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            <div class="flex p-8 flex-col items-start gap-8 bg-white">
                <div class="title-card">Selamat Datang, Poli Umum</div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- <script src="assets/pluWgins/datatables/datatables.min.js"></script> --}}
@endpush
