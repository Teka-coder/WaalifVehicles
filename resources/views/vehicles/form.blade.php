@extends('layouts.app')

@section('content')
    <h1>{{ isset($vehicle) ? 'Edit Vehicle' : 'Add Vehicle' }}</h1>
    <form action="{{ isset($vehicle) ? route('vehicles.update', $vehicle->id) : route('vehicles.store') }}" method="POST">
        @csrf
        @if(isset($vehicle))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <input type="text" name="make" class="form-control" value="{{ old('make', $vehicle->make ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" class="form-control" value="{{ old('model', $vehicle->model ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" value="{{ old('year', $vehicle->year ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="license_plate" class="form-label">License Plate</label>
            <input type="text" name="license_plate" class="form-control" value="{{ old('license_plate', $vehicle->license_plate ?? '') }}">
        </div>
        <button type="submit" class="btn btn-success">{{ isset($vehicle) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
