@extends('layouts.app')

@section('content')
<h1>Vehicles CRUD API</h1>
    <h2>Vehicles List</h2>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Add Vehicle</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>License Plate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->make }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->year }}</td>
                <td>{{ $vehicle->license_plate }}</td>
                <td>
                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vehicles->links() }} <!-- Pagination Links -->
@endsection
