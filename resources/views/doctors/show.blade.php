<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Doctor Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<nav class="navbar navbar-dark bg-primary">

    <div class="container">

        <a
            class="navbar-brand"
            href="{{ route('doctors.index') }}"
        >
            Clinic Management System
        </a>

    </div>

</nav>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Doctor Details</h3>
        </div>

        <div class="card-body">

            <p>
                <strong>Name:</strong>
                {{ $doctor->name }}
            </p>

            <p>
                <strong>Specialization:</strong>
                {{ $doctor->specialization }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $doctor->email }}
            </p>

            <p>
                <strong>Phone:</strong>
                {{ $doctor->phone }}
            </p>

            <a
                href="{{ route('doctors.edit', $doctor->id) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('doctors.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>

</div>

</body>
</html>