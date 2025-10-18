@extends('layout')

@section('content')
<div class="text-center py-5">
    <h2>Selamat Datang di Sistem Rekam Medis Digital</h2>
    <p class="lead mt-3">
        Amanah Polyclinic — Semua data pasien, dokter.
    </p>
    <hr>
    <div class="mt-4">
        <a href="{{ route('patients.index') }}" class="btn btn-primary btn-lg mx-2">Data Pasien</a>
        <a href="{{ route('doctors.index') }}" class="btn btn-success btn-lg mx-2">Data Dokter</a>
    </div>
</div>
@endsection
