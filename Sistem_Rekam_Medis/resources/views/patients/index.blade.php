@extends('layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Patient Data</h3>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">+ Add New</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Birth Date</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patients as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->birth_date }}</td>
            <td>{{ $p->address }}</td>
            <td>{{ $p->phone }}</td>
            <td>
                <a href="{{ route('patients.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('patients.destroy', $p->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
