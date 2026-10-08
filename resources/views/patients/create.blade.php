<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Patient</title>

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

            <h3>Add Patient</h3>

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
                action="{{ route('patients.store') }}"
                method="POST"
            >

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Patient Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control"
                        placeholder="Enter patient name"
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
                        value="{{ old('age') }}"
                        class="form-control"
                        placeholder="Enter age"
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

                        <option value="">
                            Select Gender
                        </option>

                        <option
                            value="Male"
                            {{ old('gender') == 'Male' ? 'selected' : '' }}
                        >
                            Male
                        </option>

                        <option
                            value="Female"
                            {{ old('gender') == 'Female' ? 'selected' : '' }}
                        >
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
                        value="{{ old('email') }}"
                        class="form-control"
                        placeholder="Enter email"
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="form-control"
                        placeholder="Enter phone number"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Add Patient
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