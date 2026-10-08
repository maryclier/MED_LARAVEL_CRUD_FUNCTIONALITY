<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Doctor</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('doctors.index') }}">
            Clinic Management System
        </a>
    </div>
</nav>

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Add Doctor</h3>
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
                action="{{ route('doctors.store') }}"
                method="POST"
            >

                @csrf

                <!-- Doctor Name -->
                <div class="mb-3">

                    <label class="form-label">
                        Doctor Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control"
                        placeholder="Enter doctor name"
                        required
                    >

                </div>

                <!-- Specialization -->
                <div class="mb-3">

                    <label class="form-label">
                        Specialization
                    </label>

                    <input
                        type="text"
                        name="specialization"
                        value="{{ old('specialization') }}"
                        class="form-control"
                        placeholder="Enter specialization"
                        required
                    >

                </div>

                <!-- Email -->
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
                        required
                    >

                </div>

                <!-- Phone -->
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
                    Add Doctor
                </button>

                <a
                    href="{{ route('doctors.index') }}"
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