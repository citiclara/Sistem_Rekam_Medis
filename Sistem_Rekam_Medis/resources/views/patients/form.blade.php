@extends('layout')

@section('content')
<h3>{{ isset($patient) ? 'Edit Patient' : 'Add New Patient' }}</h3>

<form method="POST" action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }}">
    @csrf
    @if(isset($patient)) @method('PUT') @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $patient->name ?? '') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Birth Date</label>
        <input type="date" name="birth_date" value="{{ old('birth_date', $patient->birth_date ?? '') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" value="{{ old('address', $patient->address ?? '') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $patient->phone ?? '') }}" class="form-control">
    </div>

    <button class="btn btn-success">{{ isset($patient) ? 'Update' : 'Save' }}</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
