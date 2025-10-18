@extends('layout')

@section('content')
<h3>Data Dokter</h3>
<a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Spesialisasi</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctors as $doctor)
        <tr>
            <td>{{ $doctor->id }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->specialization }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>
                <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokter ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
