@extends('layouts.app')

@section('content')
    <h1>Vehicle Details</h1>
    <p><strong>Make:</strong> {{ $vehicle->make }}</p>
    <p><strong>Model:</strong> {{ $vehicle->model }}</p>
    <p><strong>Year:</strong> {{ $vehicle->year }}</p>
    <p><strong>License Plate:</strong> {{ $vehicle->license_plate }}</p>
    <a href="{{ route('vehicles.index') }}" class="btn btn-primary">Back to List</a>
@endsection
