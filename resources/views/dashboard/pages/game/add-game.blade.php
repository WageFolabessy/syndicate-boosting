@extends('dashboard.components.main')
@section('title')
    - Add New Game
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
                <h1 class="mb-0 fw-bold">Add New Game</h1>
                <div>
                    <a href="{{ route('dashboard.game') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Games
                    </a>
                </div>
            </div>

            <!-- Add Game Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Game Information</h5>
                </div>
                <div class="form-container">
                    <form id="addGameForm" action="{{ route('dashboard.game.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <!-- Game Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Game Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter game name" required value="{{ old('name') }}">
                                </div>
                                <!-- Genre -->
                                <div class="mb-3">
                                    <label for="genre" class="form-label">
                                        Game Genre <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="genre" id="genre"
                                        placeholder="Enter game genre" required value="{{ old('genre') }}">
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter game description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Game Image -->
                                <div class="mb-3">
                                    <label class="form-label">Game Image <span class="text-danger">*</span></label>
                                    <div class="card p-3 bg-light">
                                        <div class="text-center mb-3">
                                            <img src="https://placehold.co/200x200?text=Game+Image" id="imagePreview"
                                                class="img-fluid rounded border" style="max-height:200px;width:auto">
                                        </div>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="image" id="image"
                                                accept="image/*" required>
                                            <button type="button" class="btn btn-outline-secondary" id="removeImage">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <small class="text-muted mt-2">
                                            Recommended size: 500x500px. Max file size: 2MB
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer">
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" form="addGameForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Game
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <!-- Script untuk Preview Image dan Remove Image -->
    <script>
        // Ketika user memilih file gambar, tampilkan preview
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').src = "https://placehold.co/200x200?text=Game+Image";
            }
        });

        // Ketika tombol remove diklik, hapus file terpilih dan kembalikan preview ke gambar default
        document.getElementById('removeImage').addEventListener('click', function() {
            document.getElementById('image').value = ''; // Reset input file
            document.getElementById('imagePreview').src = "https://placehold.co/200x200?text=Game+Image";
        });
    </script>
@endsection
