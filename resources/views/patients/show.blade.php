<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Patient Details</title>

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
            href="{{ route('patients.index') }}"
        >
            Clinic Management System
        </a>

    </div>

</nav>


<div class="container mt-4">

    <div class="card">

        <div class="card-header">

            <h3>Patient Details</h3>

        </div>


        <div class="card-body">

            <p>
                <strong>Name:</strong>
                {{ $patient->name }}
            </p>

            <p>
                <strong>Age:</strong>
                {{ $patient->age }}
            </p>

            <p>
                <strong>Gender:</strong>
                {{ $patient->gender }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $patient->email ?? 'N/A' }}
            </p>

            <p>
                <strong>Phone:</strong>
                {{ $patient->phone }}
            </p>


            <a
                href="{{ route('patients.edit', $patient->id) }}"
                class="btn btn-warning"
            >
                Edit
            </a>


            <a
                href="{{ route('patients.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>

</div>

</body>

</html>