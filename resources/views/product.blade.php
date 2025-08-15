{{-- resources/views/product.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Product | Animal Production System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: url('{{ asset("welcome2.jpg") }}') no-repeat center center fixed;
      background-size: cover;
    }
    .welcome-heading {
      font-family: 'Playfair Display', serif;
      font-size: 5rem;
      color: rgb(34, 20, 160);
      text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }
    .card-img-top {
      object-fit: cover;
      height: 220px;
    }
    footer {
      background-color: rgb(22, 136, 229);
      color: white;
      padding: 20px 0;
      margin-top: 60px;
    }
    button.btn-no-style {
      border: none;
      background: none;
      padding: 0;
      width: 100%;
      text-align: left;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('logo.jpg') }}" width="40" height="40" class="d-inline-block align-text-top" alt="Logo" />
      <span class="ms-2 fw-bold">Animal Production System</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('record') }}">Record</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('product') }}">Product</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('sales') }}">Sales</a></li>
      </ul>
      <form class="d-flex me-2" role="search">
        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search" />
        <button class="btn btn-light" type="submit">Search</button>
      </form>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">Logout</button>
      </form>
    </div>
  </div>
</nav>

<!-- Product Section -->
<div class="container my-5">
  <h2 class="text-center mb-5 welcome-heading">🐮 Our Animal Products 🐔</h2>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    @php
      $products = [
        ['id'=>1, 'name'=>'Fresh Milk', 'price'=>250, 'image'=>'product3.jpg', 'desc'=>'High quality fresh cow milk.'],
        ['id'=>2, 'name'=>'Farm Eggs', 'price'=>300, 'image'=>'product1.jpg', 'desc'=>'Organic eggs from our farm.'],
        ['id'=>3, 'name'=>'Chicken Meat', 'price'=>750, 'image'=>'meat_chicken.jpg', 'desc'=>'Tender and clean chicken meat.'],
        ['id'=>4, 'name'=>'Cow Meat', 'price'=>1200, 'image'=>'product4.jpg', 'desc'=>'Fresh beef from healthy cattle.'],
        ['id'=>5, 'name'=>'Goat Milk', 'price'=>2000, 'image'=>'product5.jpg', 'desc'=>'Pure goat milk full of nutrition.'],
        ['id'=>6, 'name'=>'Butter', 'price'=>500, 'image'=>'product9.jpg', 'desc'=>'Rich and creamy farm butter.'],
        ['id'=>7, 'name'=>'Cheese', 'price'=>800, 'image'=>'product7.jpg', 'desc'=>'Delicious homemade cheese.'],
        ['id'=>8, 'name'=>'Yogurt', 'price'=>450, 'image'=>'product8.jpg', 'desc'=>'Fresh and natural yogurt.'],
        ['id'=>9, 'name'=>'Sausages', 'price'=>350, 'image'=>'product6.jpg', 'desc'=>'Spicy farm-made sausages.'],
      ];
    @endphp

    @foreach($products as $product)
      <div class="col">
        <button type="button" class="btn-no-style" data-bs-toggle="modal" data-bs-target="#productModal{{ $product['id'] }}">
          <div class="card h-100 shadow-sm">
            <img src="{{ asset($product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}" />
            <div class="card-body text-center">
              <h5 class="card-title">{{ $product['name'] }}</h5>
              <p class="card-text fw-bold text-success">Rs. {{ number_format($product['price'], 2) }}</p>
            </div>
          </div>
        </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="productModal{{ $product['id'] }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product['id'] }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="productModalLabel{{ $product['id'] }}">{{ $product['name'] }}</h5>
              <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
              <img src="{{ asset($product['image']) }}" class="img-fluid rounded shadow mb-3" style="max-height: 400px;" />
              <p>{{ $product['desc'] }}</p>
              <form method="POST" action="{{ route('buy.product') }}">
                @csrf
                <input type="hidden" name="product_name" value="{{ $product['name'] }}" />
                <input type="hidden" name="price" value="{{ $product['price'] }}" />
                <button type="submit" class="btn btn-success">Buy Now for Rs. {{ number_format($product['price'], 2) }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<!-- Footer -->
<footer class="text-center">
  <div class="container">
    <p class="mb-0">© 2025 Animal Production Management System. All rights reserved.</p>
    <small>K.M.S.SHAKSARANI DHARMASENA</small>
  </div>
</footer>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>