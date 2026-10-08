<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Patient</title>

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

            <h3>Edit Patient</h3>

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
                action="{{ route('patients.update', $patient->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                <div class="mb-3">

                    <label class="form-label">
                        Patient Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $patient->name) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Age
                    </label>

                    <input
                        type="number"
                        name="age"
                        value="{{ old('age', $patient->age) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Gender
                    </label>

                    <select
                        name="gender"
                        class="form-select"
                        required
                    >

                        <option value="Male"
                            {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female"
                            {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>

                    </select>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $patient->email) }}"
                        class="form-control"
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $patient->phone) }}"
                        class="form-control"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update Patient
                </button>


                <a
                    href="{{ route('patients.index') }}"
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