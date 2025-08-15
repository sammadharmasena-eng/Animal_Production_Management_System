<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>home | Animal Production System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: url('welcome2.jpg') no-repeat center center fixed; /* Placeholder for your background image */
        background-size: cover;
        overflow-x: hidden;
    }

    .about-section {
        margin-top: 50px;
        background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transform: rotateY(-3deg) rotateX(3deg); /* Slight initial tilt */
        transition: transform 0.5s ease-in-out;
        transform-style: preserve-3d; /* Important for children to inherit 3D space */
    }

    .about-section:hover {
        transform: rotateY(0deg) rotateX(0deg) scale(1.02); /* Straighten and slightly enlarge on hover */
    }

    .info-card {
        text-align: center;
        margin-bottom: 40px;
    }

    .info-card img {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        transition: transform 0.3s ease;
    }

    .info-card img:hover {
        transform: scale(1.05);
    }

    footer {
        background-color:rgb(22, 136, 229);
        color: white;
        padding: 20px 0;
        margin-top: 60px;
    }

    /* Spinner */
    .image-placeholder {
        width: 100%;
        max-height: 400px;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner-border {
        width: 3rem;
        height: 3rem;
    }

    .welcome-heading {
        font-family: 'Playfair Display', serif;
        font-size: 4rem;
        color:rgb(37, 37, 190); /* Bootstrap primary blue */
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    /* Apply perspective to the container to enhance 3D effects */
    .container {
        perspective: 1000px;
    }

    /* 3D Hover effect for the Welcome Image */
    .split-section .col-md-6 img {
        transition: transform 0.5s ease;
        transform-origin: center center;
    }

    .split-section .col-md-6 img:hover {
        transform: translateZ(20px) rotateY(5deg); /* Move forward and slightly rotate on hover */
        box-shadow: 0 10px 30px rgba(0,0,0,0.3); /* Deeper shadow on hover */
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('logo.jpg') }}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
      <span class="ms-2 fw-bold">Animal Production System</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('record')}}">Record</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('product')}}">Product</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('sales')}}">Sales</a></li>
      </ul>
      <form class="d-flex me-2" role="search">
        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
        <button class="btn btn-light" type="submit">Search</button>
      </form>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">Logout</button>
      </form>
    </div>
  </div>
</nav>
<br>

<div class="container mt-4">
    <h1 class="text-center welcome-heading">Welcome! {{ auth()->user()->name }}</h1>

    <div class="row mt-5 split-section">
        <div class="col-md-6 p-0">
            <img src="{{ asset('welcome.jpg') }}" alt="Welcome Image" class="img-fluid w-100 h-100">
        </div>

        <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
            <div class="text-center">
                <h2 class="mb-3">Welcome to the Animal Production System</h2>
                <p class="lead">Manage your farm's records, products, and sales efficiently.</p>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">Discover Our Features</a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 about-section">
            <h2 class="text-center mb-4">About Us</h2>
            <p>
                The Animal Production System simplifies farm management with user-friendly technology. Our platform streamlines operations, enhances productivity, and promotes sustainable practices. We empower farmers to effortlessly manage animal records, track product inventory, and optimize sales, leading to greater profitability and efficiency.
            </p>
            <p>
                Founded on principles of reliability and precision, we are committed to robust solutions for the agricultural sector, supporting farmers in achieving production goals while maintaining high standards of animal welfare and environmental responsibility.
            </p>
            <h3>Our Vision</h3>
            <p>
                To be the leading provider of animal production management solutions, empowering farmers worldwide with tools for sustainable and profitable operations.
            </p>
            <h3>Key Benefits</h3>
            <ul>
                <li>Streamlined Record Keeping: Effortlessly manage animal health, breeding, and production data.</li>
                <li>Efficient Inventory Management: Track products from production to sale with real-time updates.</li>
                <li>Optimized Sales Processes: Improve sales tracking and reporting for better decision-making.</li>
            </ul>
        </div>
    </div>

    </div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">Explore Features</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="stopVideo()"></button>
      </div>
      <div class="modal-body">
        <div class="ratio ratio-16x9">
          <video id="featureVideo" controls autoplay>
            <source src="{{ asset('welcom.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="text-center">
  <div class="container">
    <p class="mb-0">© 2025 Animal Production Management System. All rights reserved.</p>
    <small>K.M.S.SHAKSARANI DHARMASENA</small>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function stopVideo() {
    const video = document.getElementById('featureVideo');
    video.pause();
    video.currentTime = 0;
  }
</script>

</body>
</html>