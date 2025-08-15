@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-image: url('{{ asset('record1.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; min-height: 100vh;">

    {{-- Header --}}
    <div class="text-center text-black mb-5 mt-3">
        <h1 class="display-3 fw-bolder shadow-text">🐄 Animal Farm Records 🐔</h1>
        <p class="lead fw-bold shadow-text">Effortlessly manage your cattle and chicken records.</p>
    </div>

    {{-- Success and New Record Messages --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success text-center animated fadeInDown">{{ session('success') }}</div>
            @endif

            @if(session('new_record'))
                @php $record = session('new_record'); @endphp
                <div class="alert alert-info fw-bold text-center animated fadeInUp">
                    <h4>New Animal Record Added Successfully!</h4>
                    <div class="card shadow border border-primary mt-3">
                       
                    @if($record->photo_path)
    <img src="{{ asset('storage/' . $record->photo_path) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Animal Image">
@else
    <img src="{{ asset('images/placeholder-animal.jpg') }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="No Image">
@endif


                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ ucfirst($record['animal_type']) }} ({{ $record['breed'] }})</h5>
                            <p class="card-text">
                                <strong>Meat Yield:</strong> {{ $record['meat_yield'] ?? 'N/A' }} kg<br>
                                <strong>Eggs:</strong> {{ $record['egg_production'] ?? 'N/A' }}<br>
                                <strong>Milk:</strong> {{ $record['milk_production'] ?? 'N/A' }} L<br>
                                <strong>Health Status:</strong> <span class="badge bg-success">{{ $record['health_status'] }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Animal Record Form --}}
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-success text-white text-center py-3 rounded-top-3">
                    <h3 class="mb-0">➕ Add New Animal Record</h3>
                </div>
                <div class="card-body p-4 bg-light">
                    <form method="POST" action="{{ route('records.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="animal_type" class="form-label fw-bold">Animal Type <span class="text-danger">*</span></label>
                                <select class="form-select form-control-lg" id="animal_type" name="animal_type" required>
                                    <option value="chicken">🐔 Chicken</option>
                                    <option value="cattle">🐄 Cattle</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="breed" class="form-label fw-bold">Breed <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" id="breed" name="breed" placeholder="e.g., Leghorn, Holstein" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="meat_yield" class="form-label fw-bold">Meat Yield (kg)</label>
                                <input type="number" step="0.01" class="form-control" id="meat_yield" name="meat_yield" placeholder="Enter yield in kg">
                            </div>
                            <div class="col-md-4">
                                <label for="egg_production" class="form-label fw-bold">Egg Production</label>
                                <input type="number" class="form-control" id="egg_production" name="egg_production" placeholder="Number of eggs">
                            </div>
                            <div class="col-md-4">
                                <label for="milk_production" class="form-label fw-bold">Milk Production (L)</label>
                                <input type="number" step="0.01" class="form-control" id="milk_production" name="milk_production" placeholder="Enter milk in L">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="health_status" class="form-label fw-bold">Health Status <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="health_status" name="health_status" placeholder="e.g., Healthy, Vaccinated" required>
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="form-label fw-bold">Animal Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
        
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg fw-bold">➕ Submit Animal Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- All Animal Records --}}
    <div class="text-center text-white mb-4">
        <h2 class="display-5 fw-bold shadow-text">All Animal Records</h2>
        <p class="lead shadow-text">Browse through all your valuable animal data.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                @forelse ($records as $record)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100 border-primary animated flipInY">
                        @if($record->photo_path)
                            <img src="{{ asset('storage/' . $record->photo_path) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Animal Image">
                        @else
                            <img src="{{ asset('images/placeholder-animal.jpg') }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="No Image Available">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-primary fs-4">{{ ucfirst($record->animal_type) }} <span class="text-muted">({{ $record->breed }})</span></h5>
                            <hr>
                            <p class="card-text mb-1">
                                <strong><i class="fas fa-drumstick-bite me-2"></i>Meat Yield:</strong> {{ $record->meat_yield ?? 'N/A' }} kg
                            </p>
                            <p class="card-text mb-1">
                                <strong><i class="fas fa-egg me-2"></i>Eggs:</strong> {{ $record->egg_production ?? 'N/A' }}
                            </p>
                            <p class="card-text mb-1">
                                <strong><i class="fas fa-milk me-2"></i>Milk:</strong> {{ $record->milk_production ?? 'N/A' }} L
                            </p>
                            <p class="card-text">
                                <strong><i class="fas fa-heartbeat me-2"></i>Health Status:</strong> <span class="badge bg-success">{{ $record->health_status }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        No animal records found. Add one using the form above!
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
    .shadow-text {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
    }
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }
    .fadeInDown {
        -webkit-animation-name: fadeInDown;
        animation-name: fadeInDown;
    }
    .fadeInUp {
        -webkit-animation-name: fadeInUp;
        animation-name: fadeInUp;
    }
    .flipInY {
        -webkit-backface-visibility: visible !important;
        backface-visibility: visible !important;
        -webkit-animation-name: flipInY;
        animation-name: flipInY;
    }
    @-webkit-keyframes fadeInDown {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, -20px, 0);
            transform: translate3d(0, -20px, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, -20px, 0);
            transform: translate3d(0, -20px, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes fadeInUp {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, 20px, 0);
            transform: translate3d(0, 20px, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, 20px, 0);
            transform: translate3d(0, 20px, 0);
        }
        to {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    @-webkit-keyframes flipInY {
        from {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
            transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
            opacity: 0;
        }
        40% {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
            transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
        }
        60% {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
            transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
            opacity: 1;
        }
        80% {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
            transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
        }
        to {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 0deg);
            transform: perspective(400px) rotate3d(0, 1, 0, 0deg);
        }
    }
    @keyframes flipInY {
        from {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
            transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
            opacity: 0;
        }
        40% {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
            transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
        }
        60% {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
            transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
            opacity: 1;
        }
        80% {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
            transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
        }
        to {
            -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 0deg);
            transform: perspective(400px) rotate3d(0, 1, 0, 0deg);
        }
    }
</style>
@endsection