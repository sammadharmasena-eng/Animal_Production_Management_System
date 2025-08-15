<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Animal Production System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
         background: url('farm4.jpg') no-repeat center center fixed; 
        background-size: 400% 400%;
        animation: backgroundShift 80s ease infinite;
        overflow-x: hidden;
        color: #333; /* Default text color */
    }

    @keyframes backgroundShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .navbar {
        background-color: #0d6efd !important; /* Bootstrap primary blue */
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .navbar-brand img {
      border-radius: 50%; /* Make the logo round */
    }

    .nav-link {
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #cce5ff !important; /* Lighter blue on hover for better contrast */
    }

    .hero-section {
        position: relative;
        overflow: hidden;
        margin-top: 50px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .hero-section img {
        width: 100%;
        height: 450px; /* Increased height for a more impactful image */
        object-fit: cover;
        border-radius: 15px;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4); /* Darker overlay for better text readability */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: white;
        text-shadow: 0 2px 5px rgba(0,0,0,0.5);
        border-radius: 15px;
    }

    .hero-overlay h1 {
        font-size: 3.5rem; /* Larger heading */
        font-weight: 700;
        margin-bottom: 15px;
    }

    .hero-overlay p {
        font-size: 1.5rem;
        text-align: center;
        max-width: 700px;
        line-height: 1.6;
    }

    .about-content-section {
        margin-top: 60px;
        padding: 30px 0;
    }

    .card {
        border: none;
        border-radius: 15px;
        margin-bottom: 30px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .card-body {
        padding: 30px;
    }

    .card-title {
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 1.8rem;
    }

    .card-text, .card-body ul {
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .card-body ul {
        padding-left: 20px;
    }

    .card-body ul li {
        margin-bottom: 8px;
    }

    .info-card {
        text-align: center;
        margin-bottom: 40px;
        background-color: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .info-card img {
        width: 150px; /* Slightly smaller for better balance */
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        transition: transform 0.3s ease, border 0.3s ease;
        border: 4px solid #0d6efd; /* Blue border for profiles */
    }

    .info-card img:hover {
        transform: scale(1.08);
        border: 4px solid #6c757d; /* Grey border on hover */
    }

    .info-card h5 {
        margin-top: 20px;
        font-weight: 600;
        color: #0d6efd;
    }

    .info-card p {
        color: #555;
        font-size: 0.95rem;
    }

    footer {
        background-color: #0d6efd;
        color: white;
        padding: 25px 0;
        margin-top: 80px;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    }

    footer p, footer small {
        margin-bottom: 0;
    }

    /* Color adjustments for card titles */
    .text-primary-custom { color: #0d6efd !important; }
    .text-success-custom { color: #198754 !important; }
    .text-warning-custom { color: #ffc107 !important; }
    .text-info-custom { color: #0dcaf0 !important; }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('logo.jpg') }}" alt="Logo" width="45" height="45" class="d-inline-block align-text-top">
      <span class="ms-2 fw-bold">Animal Production System</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('about') }}">About Us</a></li>
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

<div class="container my-5">
  <div class="hero-section">
    <img src="{{ asset('farm.jpg') }}" alt="Farm Landscape">
    <div class="hero-overlay">
      <h1>Welcome to Our Farm!</h1>
      <p>Dedicated to sustainable animal production, ensuring welfare, quality, and innovation for a better future.</p>
    </div>
  </div>
</div>

<div class="container about-content-section">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title text-primary-custom">About Our Farm</h3>
      <p class="card-text">
        Our animal production farm is committed to sustainable and innovative livestock management, combining traditional values with modern practices. We prioritize the health and well-being of our animals, ensuring they thrive in a natural and humane environment. Our dedication extends to producing high-quality products that meet the highest standards of safety and nutrition.
      </p>
      <p class="card-text">
        With years of experience in the industry, we continually invest in research and development to improve our farming techniques and minimize our environmental footprint. We believe in transparency and invite you to learn more about our operations and the care we provide to our livestock.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-success-custom">Our Mission</h4>
          <p class="card-text">To provide high-quality animal products while ensuring animal welfare, environmental sustainability, and contributing positively to our community. We strive for excellence in every aspect of our operations.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-primary-custom">Our Vision</h4>
          <p class="card-text">To become a leading ethical model farm recognized globally for quality, innovation, and our unwavering commitment to animal welfare and sustainable agricultural practices. We aim to inspire and educate future generations.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-warning-custom">What We Offer</h4>
      <ul class="list-unstyled">
        <li><i class="bi bi-arrow-right-circle-fill me-2 text-warning"></i> <strong>Premium Livestock Sales:</strong> Healthy and well-bred animals for various purposes.</li>
        <li><i class="bi bi-arrow-right-circle-fill me-2 text-warning"></i> <strong>Comprehensive Animal Health Monitoring:</strong> State-of-the-art veterinary care and preventive health programs.</li>
        <li><i class="bi bi-arrow-right-circle-fill me-2 text-warning"></i> <strong>Educational Farm Tours:</strong> Insightful tours for schools and the public to learn about sustainable farming.</li>
        <li><i class="bi bi-arrow-right-circle-fill me-2 text-warning"></i> <strong>Nutritious Organic Feed Products:</strong> Locally sourced and chemical-free feed for optimal animal health.</li>
        <li><i class="bi bi-arrow-right-circle-fill me-2 text-warning"></i> <strong>Advanced Digital Record Keeping:</strong> Efficient and transparent management of all farm activities.</li>
      </ul>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-info-custom">Our Values</h4>
      <p class="card-text">
        At the heart of our operations lie core values: *Integrity* in all our dealings, *Compassion* for our animals and environment, and a relentless pursuit of *Excellence* in every aspect of farming. We believe these values are essential for sustainable and responsible agriculture.
      </p>
    </div>
  </div>

  <h2 class="text-center my-5 text-white fw-bold">Meet Our Team & Supporters</h2>
  <div class="row text-center justify-content-center">
    <div class="col-md-4 info-card">
      <img src="{{ asset('farmer.jpg') }}" alt="Mr. Sarath - Farmer">
      <h5 class="mt-3">Mr. Sarath</h5>
      <p class="text-muted"><strong>Lead Farmer & Operations Manager</strong></p>
      <p>With over 15 years of dedicated experience, Mr. Sarath is the backbone of our farm, ensuring the well-being of our livestock and efficient farm operations.</p>
    </div>

    <div class="col-md-4 info-card">
      <img src="{{ asset('vet.jpg') }}" alt="Dr. Nadeesha - Veterinarian">
      <h5 class="mt-3">Dr. Nadeesha</h5>
      <p class="text-muted"><strong>Resident Veterinarian</strong></p>
      <p>Dr. Nadeesha is our esteemed veterinarian, specializing in animal diseases and preventive care, ensuring the optimal health of all our farm animals.</p>
     fungicides;
    </div>

    <div class="col-md-4 info-card">
      <img src="{{ asset('customer.jpg') }}" alt="Mrs. Kamala - Customer">
      <h5 class="mt-3">Mrs. Kamala</h5>
      <p class="text-muted"><strong>Valued Customer & Advocate</strong></p>
      <p>Mrs. Kamala represents our loyal customer base, having trusted and supported our organic farm for many years, appreciating our commitment to quality.</p>
    </div>
  </div>
</div>

<footer class="text-center">
  <div class="container">
    <p class="mb-1">&copy; 2025 Animal Production Management System. All rights reserved.</p>
    <small>Developed by K.M.S. SHAKSARANI DHARMASENA</small>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>