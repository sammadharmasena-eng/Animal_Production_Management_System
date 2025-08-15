<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Record| Animal Production System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
     font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: url('farm1.jpg') no-repeat center center fixed; 
        background-size: cover;
        overflow-x: hidden;
    }

    .card {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 15px; 
    }

    .chicken-img {
      height: 220px;
      object-fit: cover;
      border-radius: 8px;
    }

    /* Refined Section Titles */
    .section-title {
      font-size: 2.2rem;
      font-weight: 700;
      letter-spacing: 1px;
      padding: 10px 30px;
      border-radius: 15px;
      display: inline-block;
      margin-bottom: 25px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .section-title.chicken {
      font-family: 'Cinzel', serif;
      color: black;
      background: linear-gradient(to right, rgb(41, 25, 141), #ffc3a0);
      border: none;
    }

    .section-title.cattle {
      font-family: 'Cinzel', serif;
      color: black;
      background: linear-gradient(to right, rgb(7, 56, 23), #c2e9fb);
      border: none;
    }

    h2.section-title {
      text-align: center;
      font-weight: 600;
      color: rgb(55, 14, 237); /* This will apply to the "Animal Production Records" title */
      margin-top: 30px;
      margin-bottom: 20px;
    }

    .record-card {
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
      margin-bottom: 20px;
    }

    .chart-container {
      width: 100%;
      max-width: 650px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .record-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }

    .card-body {
      padding: 15px;
    }

    /* Login Card Specific Styles */
    .login-card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .login-card .card-header {
      background: linear-gradient(to right, #007bff, #00c6ff);
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
    }

    .login-card .btn-primary {
      background: linear-gradient(to right, #007bff, #00c6ff);
      border: none;
      transition: all 0.3s ease;
    }

    .login-card .btn-primary:hover {
      background: linear-gradient(to right, #0056b3, #0099cc);
    }

    .form-label {
      font-weight: 600;
    }

    /* Footer Styles */
    footer {
      background-color: #0d6efd;
      color: white;
      padding: 20px 0;
      margin-top: 40px;
      font-size: 0.9rem; /* Adjusted font size for better readability */
    }

    footer p.mb-0 {
        margin-bottom: 5px !important; /* Adjust margin for the first line */
    }

    footer small {
        display: block; /* Ensure the small text is on its own line */
        font-size: 0.8rem; /* Smaller font size for the name */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('logo.jpg') }}" width="40" height="40" class="d-inline-block align-text-top" alt="Logo">
      <span class="ms-2 fw-bold">Animal Production System</span>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('record')}}">Record</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Product</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('sales') }}">Sales</a></li>
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

<div class="container py-5">
  <h3 class="text-center section-title chicken">Chicken Record</h3>
  <div class="row justify-content-center g-4">
    <div class="col-md-4">
      <div class="card p-3">
        <img src="{{ asset('chicken.jpg') }}" alt="Chicken" class="chicken-img w-100 mb-3">
        <h5>Farm Chicken A1</h5>
        <p>Healthy layer chicken, 1.5 years old, producing quality eggs consistently.</p>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#chickenModal1">Read More</button>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
        <img src="{{ asset('chicken2.jpg') }}" alt="Chicken" class="chicken-img w-100 mb-3">
        <h5>Farm Chicken B2</h5>
        <p>Meat-special breed raised organically for high protein yield.</p>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#chickenModal2">Read More</button>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
        <img src="{{ asset('chicken3.jpg') }}" alt="Chicken" class="chicken-img w-100 mb-3">
        <h5>Farm Chicken C3</h5>
        <p>Dual-purpose chicken breed good for both meat and eggs.</p>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#chickenModal3">Read More</button>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
  <h2 class="text-center section-title cattle">Cattle Record</h2>
  <div class="row justify-content-center g-4">
    <div class="col-md-4">
      <div class="card p-3">
        <img src="{{ asset('cow1.jpg') }}" alt="Cow 1" class="chicken-img w-100 mb-3">
        <h5>Farm Cow D1</h5>
        <p>High-yield dairy cow with consistent milk production and strong health.</p>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cowModal1">Read More</button>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
        <img src="{{ asset('cow2.jpg') }}" alt="Cow 2" class="chicken-img w-100 mb-3">
        <h5>Farm Cow E2</h5>
        <p>Beef breed raised with organic grass-fed nutrition. Excellent body mass.</p>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cowModal2">Read More</button>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
        <img src="{{ asset('cow3.jpg') }}" alt="Cow 3" class="chicken-img w-100 mb-3">
        <h5>Farm Cow F3</h5>
        <p>Dual-purpose cow breed providing both milk and meat with moderate yield.</p>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cowModal3">Read More</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="chickenModal1" tabindex="-1" aria-labelledby="chickenModal1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="chickenModal1Label">Farm Chicken A1 - Full Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label fw-bold">Name</label><input type="text" class="form-control" value="Farm Chicken A1" readonly></div>
            <div class="col-md-6"><label class="form-label fw-bold">Breed</label><input type="text" class="form-control" value="Layer Chicken" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Age</label><input type="text" class="form-control" value="18 months" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Type</label><input type="text" class="form-control" value="Egg" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Health</label><input type="text" class="form-control" value="Excellent" readonly></div>
            <div class="col-12"><label class="form-label fw-bold">Description</label><textarea class="form-control" rows="3" readonly>High-yield egg producer with consistent laying performance and good health.</textarea></div>
            <div class="col-12 text-center"><img src="{{ asset('chicken.jpg') }}" class="img-fluid rounded" style="max-height:250px;"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="chickenModal2" tabindex="-1" aria-labelledby="chickenModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="chickenModal2Label">Farm Chicken B2 - Full Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label fw-bold">Name</label><input type="text" class="form-control" value="Farm Chicken B2" readonly></div>
            <div class="col-md-6"><label class="form-label fw-bold">Breed</label><input type="text" class="form-control" value="Broiler" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Age</label><input type="text" class="form-control" value="12 months" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Type</label><input type="text" class="form-control" value="Meat" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Health</label><input type="text" class="form-control" value="Very Good" readonly></div>
            <div class="col-12"><label class="form-label fw-bold">Description</label><textarea class="form-control" rows="3" readonly>Organically raised meat-special breed with excellent growth and protein yield.</textarea></div>
            <div class="col-12 text-center"><img src="{{ asset('chicken2.jpg') }}" class="img-fluid rounded" style="max-height:250px;"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="chickenModal3" tabindex="-1" aria-labelledby="chickenModal3Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="chickenModal3Label">Farm Chicken C3 - Full Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label fw-bold">Name</label><input type="text" class="form-control" value="Farm Chicken C3" readonly></div>
            <div class="col-md-6"><label class="form-label fw-bold">Breed</label><input type="text" class="form-control" value="Dual-purpose" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Age</label><input type="text" class="form-control" value="16 months" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Type</label><input type="text" class="form-control" value="Dual" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Health</label><input type="text" class="form-control" value="Good" readonly></div>
            <div class="col-12"><label class="form-label fw-bold">Description</label><textarea class="form-control" rows="3" readonly>Breed suitable for both meat and eggs, adaptable to various environments.</textarea></div>
            <div class="col-12 text-center"><img src="{{ asset('chicken3.jpg') }}" class="img-fluid rounded" style="max-height:250px;"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cowModal1" tabindex="-1" aria-labelledby="cowModal1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="cowModal1Label">Farm Cow D1 - Full Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label fw-bold">Name</label><input type="text" class="form-control" value="Farm Cow D1" readonly></div>
            <div class="col-md-6"><label class="form-label fw-bold">Breed</label><input type="text" class="form-control" value="Holstein" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Age</label><input type="text" class="form-control" value="36 months" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Type</label><input type="text" class="form-control" value="Dairy" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Health</label><input type="text" class="form-control" value="Excellent" readonly></div>
            <div class="col-12"><label class="form-label fw-bold">Description</label><textarea class="form-control" rows="3" readonly>High-yield dairy cow with 30L/day milk production and excellent udder health.</textarea></div>
            <div class="col-12 text-center"><img src="{{ asset('cow1.jpg') }}" class="img-fluid rounded" style="max-height:250px;"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cowModal2" tabindex="-1" aria-labelledby="cowModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="cowModal2Label">Farm Cow E2 - Full Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label fw-bold">Name</label><input type="text" class="form-control" value="Farm Cow E2" readonly></div>
            <div class="col-md-6"><label class="form-label fw-bold">Breed</label><input type="text" class="form-control" value="Angus" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Age</label><input type="text" class="form-control" value="30 months" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Type</label><input type="text" class="form-control" value="Beef" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Health</label><input type="text" class="form-control" value="Very Good" readonly></div>
            <div class="col-12"><label class="form-label fw-bold">Description</label><textarea class="form-control" rows="3" readonly>Beef-special breed raised on grass, high body mass and tenderness.</textarea></div>
            <div class="col-12 text-center"><img src="{{ asset('cow2.jpg') }}" class="img-fluid rounded" style="max-height:250px;"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cowModal3" tabindex="-1" aria-labelledby="cowModal3Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="cowModal3Label">Farm Cow F3 - Full Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row g-3">
            <div class="col-md-6"><label class="form-label fw-bold">Name</label><input type="text" class="form-control" value="Farm Cow F3" readonly></div>
            <div class="col-md-6"><label class="form-label fw-bold">Breed</label><input type="text" class="form-control" value="Mixed" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Age</label><input type="text" class="form-control" value="32 months" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Type</label><input type="text" class="form-control" value="Dual" readonly></div>
            <div class="col-md-4"><label class="form-label fw-bold">Health</label><input type="text" class="form-control" value="Good" readonly></div>
            <div class="col-12"><label class="form-label fw-bold">Description</label><textarea class="form-control" rows="3" readonly>Dual-purpose cow with moderate milk yield and strong meat build.</textarea></div>
            <div class="col-12 text-center"><img src="{{ asset('cow3.jpg') }}" class="img-fluid rounded" style="max-height:250px;"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card login-card">
        <div class="card-header text-white text-center">
          <h4 class="mb-0">👨‍🌾 Farmer Login</h4>
        </div>
        <div class="card-body px-5">
          @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
          @endif
          <form method="POST" action="{{ route('farmer.login.submit.from.record') }}">
            @csrf
            <div class="mb-4">
              <label for="email" class="form-label">📧 Email address</label>
              <input type="email" class="form-control rounded-pill" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">🔒 Password</label>
              <input type="password" class="form-control rounded-pill" name="password" placeholder="Enter your password" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg rounded-pill">Login as Farmer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container my-5">
  <h3 class="text-center section-title" style="color:black;">Production Volume Chart</h3>
  <div class="card p-4 shadow-lg">
    <canvas id="productionChart" height="100"></canvas>
  </div>
</div>
<script>
  const ctx = document.getElementById('productionChart').getContext('2d');
  const productionChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Eggs', 'Chicken Meat', 'Milk', 'Beef', 'Others'],
      datasets: [{
        label: 'Production Volume (kg/units)',
        data: [12000, 8500, 14000, 7300, 3000], 
        backgroundColor: [
          'rgba(255, 206, 86, 0.7)',
          'rgba(255, 99, 132, 0.7)',
          'rgba(54, 162, 235, 0.7)',
          'rgba(75, 192, 192, 0.7)',
          'rgba(153, 102, 255, 0.7)'
        ],
        borderColor: [
          'rgba(255, 206, 86, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Quantity'
          }
        }
      }
    }
  });
</script>

<div class="container mt-4">
  <h2 class="section-title">Animal Production Records</h2>
  <div class="row mt-4">
    <div class="col-md-6">
      <div class="p-3 bg-white rounded shadow-sm">
        <h5>Milk Cattle: <strong>10</strong></h5>
        <p>Healthy cows used for milk production.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="p-3 bg-white rounded shadow-sm">
        <h5>Beef Cattle: <strong>5</strong></h5>
        <p>Cows raised for meat production.</p>
      </div>
    </div>
    <div class="col-md-6 mt-3">
      <div class="p-3 bg-white rounded shadow-sm">
        <h5>Egg Chickens: <strong>15</strong></h5>
        <p>Layers producing eggs regularly.</p>
      </div>
    </div>
    <div class="col-md-6 mt-3">
      <div class="p-3 bg-white rounded shadow-sm">
        <h5>Meat Chickens: <strong>8</strong></h5>
        <p>Broilers raised for meat.</p>
      </div>
    </div>
    <div class="col-md-6 mt-3">
      <div class="p-3 bg-white rounded shadow-sm">
        <h5>Chicks: <strong>12</strong></h5>
        <p>Newly hatched chicks.</p>
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
</body>
</html>