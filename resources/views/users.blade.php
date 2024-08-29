<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Ensure the button is visible */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            visibility: visible;
            opacity: 1;
            transition: opacity 0.15s linear;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body class="antialiased">
<div class="container mt-5">
    <h1 class="mb-4 text-center fw-bold">Filter Users by Name</h1>

    <!-- Input form to filter users by name -->
    <form method="GET" action="{{ url('/users') }}">
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Enter name to search" value="{{ request('name') }}">
            <button class="btn btn-primary" type="submit">Search</button>
            <a href="{{ url('/users') }}" class="btn btn-secondary">Clear Filter</a>
        </div>
    </form>

    @if($users->isNotEmpty())
    <!-- Display the filtered users or all users -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->type }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No users found.</p>
    @endif
</div>
</body>
</html>
