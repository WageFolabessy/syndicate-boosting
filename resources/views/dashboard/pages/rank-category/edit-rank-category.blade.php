@extends('dashboard.components.main')
@section('title')
    - Edit Rank Category
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
                <h1 class="mb-0 fw-bold">Edit Rank Category</h1>
                <div>
                    <a href="{{ route('dashboard.rank-category') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Rank Categories
                    </a>
                </div>
            </div>

            <!-- Edit Rank Category Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Rank Category Information</h5>
                </div>
                <div class="form-container">
                    <form id="editRankCategoryForm"
                        action="{{ route('dashboard.rank-category.update', $rankCategory->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <!-- Game Selection -->
                                <div class="mb-3">
                                    <label for="game_id" class="form-label">
                                        Select Game <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="game_id" id="game_id" required>
                                        <option value="">-- Select Game --</option>
                                        @foreach ($games as $game)
                                            <option value="{{ $game->id }}"
                                                {{ old('game_id', $rankCategory->game_id) == $game->id ? 'selected' : '' }}>
                                                {{ $game->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Rank Category Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Category Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter rank category name" required
                                        value="{{ old('name', $rankCategory->name) }}">
                                </div>
                                <!-- Display Order -->
                                <div class="mb-3">
                                    <label for="display_order" class="form-label">
                                        Display Order
                                    </label>
                                    <input type="number" class="form-control" name="display_order" id="display_order"
                                        placeholder="Enter display order"
                                        value="{{ old('display_order', $rankCategory->display_order) }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Rank Category Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">
                                        Category Image <span class="text-danger">*</span>
                                    </label>
                                    <div class="card p-3 bg-light">
                                        <div class="text-center mb-3">
                                            <img src="{{ $rankCategory->image ? asset('storage/' . $rankCategory->image) : 'https://placehold.co/200x200?text=Category+Image' }}"
                                                id="imagePreview" class="img-fluid rounded border"
                                                style="max-height:200px;width:auto">
                                        </div>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="image" id="image"
                                                accept="image/*">
                                            <button type="button" class="btn btn-outline-secondary" id="removeImage">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <small class="text-muted mt-2">
                                            Recommended size: 500x500px. Max file size: 2MB.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.history.back()">Cancel</button>
                    <button type="submit" form="editRankCategoryForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Rank Category
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
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').src =
                    "{{ $rankCategory->image ? asset('storage/' . $rankCategory->image) : 'https://placehold.co/200x200?text=Category+Image' }}";
            }
        });

        // Ketika tombol remove diklik, reset file input dan kembalikan preview ke gambar sebelumnya
        document.getElementById('removeImage').addEventListener('click', function() {
            document.getElementById('image').value = ''; // Reset input file
            document.getElementById('imagePreview').src =
                "{{ $rankCategory->image ? asset('storage/' . $rankCategory->image) : 'https://placehold.co/200x200?text=Category+Image' }}";
        });
    </script>
@endsection
