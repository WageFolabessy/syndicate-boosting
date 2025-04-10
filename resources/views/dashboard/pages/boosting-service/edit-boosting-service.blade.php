@extends('dashboard.components.main')
@section('title')
    - Edit Boosting Service
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
                <h1 class="mb-0 fw-bold">Edit Boosting Service</h1>
                <div>
                    <a href="{{ route('dashboard.boosting-service') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Boosting Services
                    </a>
                </div>
            </div>

            <!-- Edit Boosting Service Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Boosting Service Information</h5>
                </div>
                <div class="form-container">
                    <form id="editBoostingServiceForm"
                        action="{{ route('dashboard.boosting-service.update', $service->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <!-- Left Column -->
                            <div class="col-12 col-md-6">
                                <!-- Game Selection -->
                                <div class="mb-3">
                                    <label for="game_id" class="form-label">Select Game <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="game_id" id="game_id" required>
                                        <option value="">-- Select Game --</option>
                                        @foreach ($games as $game)
                                            <option value="{{ $game->id }}"
                                                {{ old('game_id', $service->game_id) == $game->id ? 'selected' : '' }}>
                                                {{ $game->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="string" class="form-control" name="title" id="title"
                                        placeholder="Enter title" required
                                        value="{{ old('title', $service->title) }}">
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="4"
                                        placeholder="Enter service description">{{ old('description', $service->description) }}</textarea>
                                </div>
                                <!-- Labels (Multi-select) -->
                                <div class="mb-3">
                                    <label for="labels" class="form-label">Select Labels</label>
                                    <select name="labels[]" id="labels" class="form-select" multiple>
                                        @foreach ($allLabels as $label)
                                            <option value="{{ $label->id }}"
                                                {{ in_array($label->id, $service->labels->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $label->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">
                                        Hold Ctrl (or Command on Mac) to select multiple labels.
                                    </small>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="col-12 col-md-6">
                                <!-- Original Price -->
                                <div class="mb-3">
                                    <label for="original_price" class="form-label">Original Price <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="original_price" id="original_price"
                                        placeholder="Enter original price" required
                                        value="{{ old('original_price', $service->original_price) }}">
                                </div>
                                <!-- Sale Price -->
                                <div class="mb-3">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <input type="number" class="form-control" name="sale_price" id="sale_price"
                                        placeholder="Enter sale price (if any)"
                                        value="{{ old('sale_price', $service->sale_price) }}">
                                </div>
                                <!-- Service Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Service Image <span
                                            class="text-danger">*</span></label>
                                    <div class="card p-3 bg-light">
                                        <div class="text-center mb-3">
                                            <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://placehold.co/200x200?text=Service+Image' }}"
                                                id="imagePreview" class="img-fluid rounded border"
                                                style="max-height:200px;width:auto">
                                        </div>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="image" id="image"
                                                accept="image/*">
                                            <button type="button" class="btn btn-outline-secondary" id="removeImage"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                        <small class="text-muted mt-2">Recommended size: 500x500px. Max file size:
                                            2MB.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.history.back()">Cancel</button>
                    <button type="submit" form="editBoostingServiceForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Boosting Service
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <!-- Script for Preview Image and Remove Image -->
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').src =
                    "{{ $service->image ? asset('storage/' . $service->image) : 'https://placehold.co/200x200?text=Service+Image' }}";
            }
        });

        document.getElementById('removeImage').addEventListener('click', function() {
            document.getElementById('image').value = '';
            document.getElementById('imagePreview').src =
                "{{ $service->image ? asset('storage/' . $service->image) : 'https://placehold.co/200x200?text=Service+Image' }}";
        });
    </script>
@endsection
