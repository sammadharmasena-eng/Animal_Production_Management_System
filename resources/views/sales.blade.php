<!DOCTYPE html>  <html lang="en">  
<head>  
  <meta charset="UTF-8" />  
  <title>Sales | Animal Production System</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />  
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet" />  
  <script src="https://js.stripe.com/v3/"></script>  
  <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>  
  <style>  
    body {  
      font-family: 'Poppins', sans-serif;  
      margin: 0; padding: 0;  
      min-height: 100vh;  
      background: url('{{ asset("login1.jpg") }}') no-repeat center center fixed;  
      background-size: cover;  
      overflow-x: hidden;  
    }  
    footer {  
      background-color: rgb(22, 136, 229);  
      color: white;  
      padding: 20px 0;  
      margin-top: auto;  
    }  
    .form-container {  
      background-color: rgba(155, 147, 147, 0.9);  
      border-radius: 10px;  
      padding: 30px;  
      max-width: 600px;  
      margin: 60px auto 40px auto;  
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);  
    }  
    .page-title {  
      font-family: 'Playfair Display', serif;  
      font-size: 3.5rem;  
      color: rgb(50, 62, 234);  
      text-shadow: 2px 2px 4px rgba(0,0,0,0.2);  
      text-align: center;  
      margin-bottom: 40px;  
    }  
    #card-element {  
      padding: 10px;  
      border: 1px solid #ced4da;  
      border-radius: 4px;  
      background-color: white;  
    }  
  </style>  
</head>  
<body class="d-flex flex-column min-vh-100">  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">  
  <div class="container-fluid">  
    <a class="navbar-brand" href="#">  
      <img src="{{ asset('logo.jpg') }}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top" />  
      <span class="ms-2 fw-bold">Animal Production System</span>  
    </a>  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">  
      <span class="navbar-toggler-icon"></span>  
    </button>  
    <div class="collapse navbar-collapse" id="navbarNavDropdown">  
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>  
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>  
        <li class="nav-item"><a class="nav-link" href="{{ route('record') }}">Record</a></li>  
        <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Product</a></li>  
        <li class="nav-item"><a class="nav-link active" href="{{ route('sales.form') }}">Sales</a></li>  
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
</nav>  <div class="form-container">  
  <h1 class="page-title">Complete Your Purchase</h1>  @if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

  <form id="payment-form" action="{{ route('stripe.payment') }}" method="POST">  
    @csrf  <div class="mb-3">  
  <label for="product_name" class="form-label">Product Name</label>  
  <input type="text" id="product_name" name="product_name"  
    class="form-control @error('product_name') is-invalid @enderror"  
    value="{{ old('product_name', $product_name ?? '') }}" readonly />  
  @error('product_name')  
    <div class="invalid-feedback">{{ $message }}</div>  
  @enderror  
</div>  

<div class="mb-3">  
  <label for="price" class="form-label">Unit Price (Rs.)</label>  
  <input type="text" id="price" name="price"  
    class="form-control @error('price') is-invalid @enderror"  
    value="{{ old('price', isset($price) ? number_format($price, 2) : '') }}" readonly />  
  @error('price')  
    <div class="invalid-feedback">{{ $message }}</div>  
  @enderror  
</div>  

<div class="mb-3">  
  <label for="quantity" class="form-label">Quantity</label>  
  <input type="number" id="quantity" name="quantity"  
    class="form-control @error('quantity') is-invalid @enderror"  
    value="{{ old('quantity', 1) }}" min="1" required />  
  @error('quantity')  
    <div class="invalid-feedback">{{ $message }}</div>  
  @enderror  
</div>  

<div class="mb-3">  
  <label for="total_price" class="form-label">Total Price (Rs.)</label>  
  <input type="text" id="total_price" name="total_price"  
    class="form-control @error('total_price') is-invalid @enderror"  
    value="{{ old('total_price') }}" readonly />  
  @error('total_price')  
    <div class="invalid-feedback">{{ $message }}</div>  
  @enderror  
</div>  

<div class="mb-3">  
  <label for="customer_name" class="form-label">Customer Name</label>  
  <input type="text" id="customer_name" name="customer_name"  
    class="form-control @error('customer_name') is-invalid @enderror"  
    value="{{ old('customer_name') }}" required placeholder="Enter your full name" />  
  @error('customer_name')  
    <div class="invalid-feedback">{{ $message }}</div>  
  @enderror  
</div>  

<div class="mb-3">  
  <label for="contact" class="form-label">Contact Number</label>  
  <input type="text" id="contact" name="contact"  
    class="form-control @error('contact') is-invalid @enderror"  
    value="{{ old('contact') }}" required placeholder="Enter your phone number" />  
  @error('contact')  
    <div class="invalid-feedback">{{ $message }}</div>  
  @enderror  
</div>  

<div class="mb-3">  
  <label for="address" class="form-label">Delivery Address</label>  
  <textarea id="address" name="address" rows="3"  
    class="form-control @error('address') is-invalid @enderror"  
    required placeholder="Enter your delivery address">{{ old('address') }}</textarea>  
  @error('address')  
    <div class="invalid-feedback">{{ $message }}</div>  
  @enderror  
</div>  

<div class="mb-3">  
  <label>Card Details</label>  
  <div id="card-element"></div>  
  <div id="card-errors" role="alert" style="color: red; margin-top: 5px;"></div>  
</div>  

<input type="hidden" name="stripeToken" id="stripeToken">  

<button type="submit" class="btn btn-success w-100">Pay Now</button>

  </form>  
</div>  <div class="container mt-5 mb-5">  
  <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: rgb(36, 40, 212); text-shadow: 1px 1px 3px rgba(0,0,0,0.1);">  
    Sales Records  
  </h2>  
  <table class="table table-bordered table-striped bg-light">  
    <thead>  
      <tr>  
        <th>ID</th>  
        <th>Product Name</th>  
        <th>Quantity</th>  
        <th>Total Price</th>  
        <th>Customer</th>  
        <th>Contact Number</th>  
      </tr>  
    </thead>  
    <tbody>  
      @if(isset($sales) && count($sales))  
        @foreach($sales as $sale)  
          <tr>  
            <td>{{ $sale->id }}</td>  
            <td>{{ $sale->product_name }}</td>  
            <td>{{ $sale->quantity }}</td>  
            <td>Rs. {{ number_format($sale->total_price, 2) }}</td>  
            <td>{{ $sale->customer_name }}</td>  
            <td>{{ $sale->contact }}</td>  
          </tr>  
        @endforeach  
      @else  
        <tr>  
          <td colspan="6" class="text-center">No sales data available.</td>  
        </tr>  
      @endif  
    </tbody>  
  </table>  
</div>  <footer class="text-center mt-auto">  
  <div class="container">  
    <p class="mb-0">© 2025 Animal Production Management System. All rights reserved.</p>  
    <small>K.M.S.SHAKSARANI DHARMASENA</small>  
  </div>  
</footer>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  <script>  
  // Calculate total price on quantity change  
  function calculateTotal() {  
    const price = parseFloat(document.getElementById("price").value.replace(/,/g, '')) || 0;  
    const quantity = parseInt(document.getElementById("quantity").value) || 0;  
    const total = price * quantity;  
    document.getElementById("total_price").value = total.toFixed(2);  
  }  
  
  window.onload = function () {  
    calculateTotal();  
  
    // Stripe setup  
    var stripe = Stripe('{{ config('services.stripe.key') }}');  
    var elements = stripe.elements();  
    var card = elements.create('card');  
    card.mount('#card-element');  
  
    // Display card errors  
    card.on('change', function(event) {  
      var displayError = document.getElementById('card-errors');  
      if (event.error) {  
        displayError.textContent = event.error.message;  
      } else {  
        displayError.textContent = '';  
      }  
    });  
  
    // Handle form submission  
    var form = document.getElementById('payment-form');  
    form.addEventListener('submit', function(event) {  
      event.preventDefault();  
  
      stripe.createToken(card).then(function(result) {  
        if (result.error) {  
          // Inform the user if there was an error.  
          var errorElement = document.getElementById('card-errors');  
          errorElement.textContent = result.error.message;  
        } else {  
          // Send the token to your server.  
          document.getElementById('stripeToken').value = result.token.id;  
          form.submit();  
        }  
      });  
    });  
  
    // Calculate total on quantity input  
    document.getElementById('quantity').addEventListener('input', calculateTotal);  
  }  
</script>  </body>  
</html>  
Mekata