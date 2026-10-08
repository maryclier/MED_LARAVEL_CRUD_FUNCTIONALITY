<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Patients</title>

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
                href="#"
                class="btn btn-light btn-sm"
            >
                Appointments
            </a>

        </div>

    </div>

</nav>


<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h1>List of Patients</h1>

        <a
            href="{{ route('patients.create') }}"
            class="btn btn-primary"
        >
            Add Patient
        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-primary">

                    <tr>

                        <th>#</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="220">Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($patients as $patient)

                        <tr>

                            <td>
                                {{ $patient->id }}
                            </td>

                            <td>
                                {{ $patient->name }}
                            </td>

                            <td>
                                {{ $patient->age }}
                            </td>

                            <td>
                                {{ $patient->gender }}
                            </td>

                            <td>
                                {{ $patient->email ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $patient->phone }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('patients.edit', $patient->id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    Edit
                                </a>

                                <a
                                    href="{{ route('patients.show', $patient->id) }}"
                                    class="btn btn-info btn-sm"
                                >
                                    View
                                </a>

                                <form
                                    action="{{ route('patients.destroy', $patient->id) }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this patient?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center"
                            >
                                No patients found.
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