@extends('dashboard.components.main')
@section('title')
    - Profile
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0 fw-bold">Profile</h1>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                    </a>
                </div>
            </div>

            <!-- Add Admin Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Profile Information</h5>
                </div>
                <div class="form-container">
                    <form id="addAdminForm" action="{{ route('dashboard.admin.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row g-4">
                            <div class="col-12 col-md-12">
                                <!-- Admin Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter admin name" required value="{{ $admin->name }}">
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter admin email" required value="{{ $admin->email }}">
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter admin password">
                                </div>
                                <!-- Password Confirmation-->
                                <div class="mb-3">
                                    <label for="password-confirmation" class="form-label">
                                        Password Confirmation
                                    </label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" placeholder="Enter admin password confirmation"">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer">
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" form="addAdminForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Profile
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
