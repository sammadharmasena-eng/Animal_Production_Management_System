<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Register</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
           
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: url('login2.jpg') no-repeat center center fixed; 
            background-size: 200% 200%;
            animation: backgroundShift 70s ease infinite;
            overflow-x: hidden;
        }

        @keyframes backgroundShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .main-header {
              font-family: 'Playfair Display', serif;
            text-align: center;
            font-size: 4.5rem;
            font-weight: 700;
            color:rgb(31, 20, 183);
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(-30px);
            animation: headerFade 1.5s ease-out forwards;
            animation-delay: 0.8s;
        }

        @keyframes headerFade {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 25px;
            transition: transform 0.3s ease;
            animation: fadeUp 1s ease-out forwards;
            opacity: 0;
            transform: translateY(40px);
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        input.form-control:focus {
            border-color: #3366cc;
            box-shadow: 0 0 8px rgba(51, 102, 204, 0.4);
        }

        .btn-primary:hover {
            background-color: #254e99;
        }

        .btn-success:hover {
            background-color: #1f8a5f;
        }

        .alert {
            font-size: 0.9rem;
        }

        .equal-height {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .navbar-brand img {
            border-radius: 50%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" width="40" height="40">
            <span class="ms-2 fw-bold">Animal Production System</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">About Us</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Record</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Product</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Sales</a></li>
            </ul>

            <!-- Search Bar -->
            <form class="d-flex me-2" role="search">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-light" type="submit">Search</button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="main-header">
        Animal Production Management System - Login & Register
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row g-4">

                <!-- Login Form -->
                <div class="col-md-6">
                    <div class="form-card equal-height">
                        <div class="card-body">
                            <h3 class="card-title">Login</h3>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif

                            <form method="POST" action="{{ route('login.submit') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ID Number</label>
                                    <input type="text" name="id_number" class="form-control" required></br></br></br></br></br></br>
                                </div>
                               
                                <button class="btn btn-primary w-100">Login</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Register Form -->
                <div class="col-md-6">
                    <div class="form-card equal-height">
                        <div class="card-body">
                            <h3 class="card-title">Register</h3>

                            @if($errors->any() && !$errors->has('email'))
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            @if($error !== 'Invalid credentials.')
                                                <li>{{ $error }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ID Number</label>
                                    <input type="text" name="id_number" class="form-control" required value="{{ old('id_number') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" required value="{{ old('phone_number') }}">
                                </div>
                               
                                <button class="btn btn-success w-100">Register</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>