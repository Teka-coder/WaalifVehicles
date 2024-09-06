<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Driver Dashboard</h1>
        <h2>Vehicle List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>License Plate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->make }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>{{ $vehicle->license_plate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vehicles->links() }}
    </div>
</body>
</html>
