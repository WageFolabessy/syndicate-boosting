@extends('dashboard.components.main')
@section('title')
    - Edit Label
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
                <h1 class="mb-0 fw-bold">Edit Label</h1>
                <div>
                    <a href="{{ route('dashboard.label') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Labels
                    </a>
                </div>
            </div>

            <!-- Edit Label Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Label Information</h5>
                </div>
                <div class="form-container">
                    <form id="editLabelForm" action="{{ route('dashboard.label.update', $label->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Label Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter label name" required value="{{ old('name', $label->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="color" class="form-label">
                                        Label Color <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="color" id="color"
                                        placeholder="Enter label color (can be filled either with color name or hex code)"
                                        value="{{ old('color', $label->color) }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.history.back()">Cancel</button>
                    <button type="submit" form="editLabelForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Label
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
