<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Appointments</title>

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

        <div>

            <a
                href="{{ route('doctors.index') }}"
                class="btn btn-light btn-sm"
            >
                Doctors
            </a>

            <a
                href="{{ route('patients.index') }}"
                class="btn btn-light btn-sm"
            >
                Patients
            </a>

            <a
                href="{{ route('appointments.index') }}"
                class="btn btn-light btn-sm"
            >
                Appointments
            </a>

        </div>

    </div>

</nav>


<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h1>List of Appointments</h1>

        <a
            href="{{ route('appointments.create') }}"
            class="btn btn-primary"
        >
            Add Appointment
        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-primary">

                    <tr>

                        <th>#</th>
                        <th>Doctor</th>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th width="220">Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($appointments as $appointment)

                        <tr>

                            <td>
                                {{ $appointment->id }}
                            </td>

                            <td>
                                {{ $appointment->doctor->name }}
                            </td>

                            <td>
                                {{ $appointment->patient->name }}
                            </td>

                            <td>
                                {{ $appointment->appointment_date }}
                            </td>

                            <td>
                                {{ $appointment->appointment_time }}
                            </td>

                            <td>
                                {{ $appointment->status }}
                            </td>

                            <td>
                                {{ $appointment->notes ?? 'N/A' }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('appointments.edit', $appointment->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    Edit
                                </a>

                                <a
                                    href="{{ route('appointments.show', $appointment->id) }}"
                                    class="btn btn-info btn-sm"
                                >
                                    View
                                </a>

                                <form
                                    action="{{ route('appointments.destroy', $appointment->id) }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this appointment?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center"
                            >
                                No appointments found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>