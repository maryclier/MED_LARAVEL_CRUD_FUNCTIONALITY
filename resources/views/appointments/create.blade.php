<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Appointment</title>

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

            <h3>Add Appointment</h3>

        </div>


        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('appointments.store') }}"
                method="POST"
            >

                @csrf


                <!-- Doctor -->

                <div class="mb-3">

                    <label class="form-label">
                        Doctor
                    </label>

                    <select
                        name="doctor_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Doctor
                        </option>

                        @foreach($doctors as $doctor)

                            <option
                                value="{{ $doctor->id }}"
                                {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}
                            >
                                {{ $doctor->name }}
                                - {{ $doctor->specialization }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Patient -->

                <div class="mb-3">

                    <label class="form-label">
                        Patient
                    </label>

                    <select
                        name="patient_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Patient
                        </option>

                        @foreach($patients as $patient)

                            <option
                                value="{{ $patient->id }}"
                                {{ old('patient_id') == $patient->id ? 'selected' : '' }}
                            >
                                {{ $patient->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- Date -->

                <div class="mb-3">

                    <label class="form-label">
                        Appointment Date
                    </label>

                    <input
                        type="date"
                        name="appointment_date"
                        value="{{ old('appointment_date') }}"
                        class="form-control"
                        required
                    >

                </div>


                <!-- Time -->

                <div class="mb-3">

                    <label class="form-label">
                        Appointment Time
                    </label>

                    <input
                        type="time"
                        name="appointment_time"
                        value="{{ old('appointment_time') }}"
                        class="form-control"
                        required
                    >

                </div>


                <!-- Status -->

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Confirmed">
                            Confirmed
                        </option>

                        <option value="Completed">
                            Completed
                        </option>

                        <option value="Cancelled">
                            Cancelled
                        </option>

                    </select>

                </div>


                <!-- Notes -->

                <div class="mb-3">

                    <label class="form-label">
                        Notes
                    </label>

                    <textarea
                        name="notes"
                        class="form-control"
                        rows="4"
                        placeholder="Enter notes"
                    >{{ old('notes') }}</textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Add Appointment
                </button>


                <a
                    href="{{ route('appointments.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>