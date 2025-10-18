@extends('layout')

@section('content')
<h3>{{ isset($doctor) ? 'Edit Dokter' : 'Tambah Dokter' }}</h3>
<form method="POST" action="{{ isset($doctor) ? route('doctors.update', $doctor->id) : route('doctors.store') }}">
    @csrf
    @if(isset($doctor)) @method('PUT') @endif

    <div class="mb-3">
        <label>Nama Dokter</label>
        <input type="text" name="name" value="{{ old('name', $doctor->name ?? '') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Spesialisasi</label>
        <input type="text" name="specialization" value="{{ old('specialization', $doctor->specialization ?? '') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="phone" value="{{ old('phone', $doctor->phone ?? '') }}" class="form-control">
    </div>

    <button class="btn btn-success">{{ isset($doctor) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
