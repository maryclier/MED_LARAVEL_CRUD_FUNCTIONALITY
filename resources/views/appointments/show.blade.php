<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Appointment Details</title>

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
            href="{{ route('appointments.index') }}"
        >
            Clinic Management System
        </a>

    </div>

</nav>


<div class="container mt-4">

    <div class="card">

        <div class="card-header">

            <h3>Appointment Details</h3>

        </div>


        <div class="card-body">

            <p>
                <strong>Doctor:</strong>
                {{ $appointment->doctor->name }}
            </p>

            <p>
                <strong>Patient:</strong>
                {{ $appointment->patient->name }}
            </p>

            <p>
                <strong>Date:</strong>
                {{ $appointment->appointment_date }}
            </p>

            <p>
                <strong>Time:</strong>
                {{ $appointment->appointment_time }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $appointment->status }}
            </p>

            <p>
                <strong>Notes:</strong>
                {{ $appointment->notes ?? 'N/A' }}
            </p>


            <a
                href="{{ route('appointments.edit', $appointment->id) }}"
                class="btn btn-warning"
            >
                Edit
            </a>


            <a
                href="{{ route('appointments.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>

</div>

</body>

</html>