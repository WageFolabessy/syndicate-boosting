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
                                <!-- Developer -->
                                <div class="mb-3">
                                    <label for="developer" class="form-label">
                                        Game Developer <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="developer" id="developer"
                                        placeholder="Enter game developer" required value="{{ old('developer') }}">
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

                            <!-- Login Methods -->
                            <div class="col-12">
                                <div class="card border-0 bg-light p-3">
                                    <label class="form-label fw-semibold mb-2">
                                        <i class="fas fa-key me-2 text-primary"></i>Allowed Login Methods <span class="text-danger">*</span>
                                        <small class="text-muted fw-normal">(displayed as dropdown choices when customer orders)</small>
                                    </label>
                                    <div class="d-flex flex-wrap gap-2 mb-2" id="loginMethodTags">
                                        @foreach(old('login_methods', []) as $method)
                                            <span class="badge bg-primary d-flex align-items-center gap-1 py-2 px-3" style="font-size:0.85rem;">
                                                {{ $method }}
                                                <input type="hidden" name="login_methods[]" value="{{ $method }}">
                                                <button type="button" class="btn-close btn-close-white ms-1" style="font-size:0.6rem;" onclick="removeTag(this)"></button>
                                            </span>
                                        @endforeach
                                    </div>
                                    <div class="input-group" style="max-width: 400px;">
                                        <input type="text" class="form-control form-control-sm" id="newLoginMethod" placeholder="e.g. Google, Facebook, Email" maxlength="100">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="addTag('newLoginMethod', 'loginMethodTags', 'login_methods')">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Servers -->
                            <div class="col-12">
                                <div class="card border-0 bg-light p-3">
                                    <label class="form-label fw-semibold mb-2">
                                        <i class="fas fa-globe me-2 text-success"></i>Allowed Servers <span class="text-danger">*</span>
                                        <small class="text-muted fw-normal">(displayed as dropdown choices when customer orders)</small>
                                    </label>
                                    <div class="d-flex flex-wrap gap-2 mb-2" id="serverTags">
                                        @foreach(old('servers', []) as $server)
                                            <span class="badge bg-success d-flex align-items-center gap-1 py-2 px-3" style="font-size:0.85rem;">
                                                {{ $server }}
                                                <input type="hidden" name="servers[]" value="{{ $server }}">
                                                <button type="button" class="btn-close btn-close-white ms-1" style="font-size:0.6rem;" onclick="removeTag(this)"></button>
                                            </span>
                                        @endforeach
                                    </div>
                                    <div class="input-group" style="max-width: 400px;">
                                        <input type="text" class="form-control form-control-sm" id="newServer" placeholder="e.g. Asia, Europe, America" maxlength="100">
                                        <button type="button" class="btn btn-outline-success btn-sm" onclick="addTag('newServer', 'serverTags', 'servers')">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
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

        // Tag management
        function addTag(inputId, containerId, fieldName) {
            const input = document.getElementById(inputId);
            const value = input.value.trim();
            if (!value) return;

            const container = document.getElementById(containerId);
            const badgeClass = fieldName === 'login_methods' ? 'bg-primary' : 'bg-success';

            const span = document.createElement('span');
            span.className = `badge ${badgeClass} d-flex align-items-center gap-1 py-2 px-3`;
            span.style.fontSize = '0.85rem';
            span.innerHTML = `
                ${value}
                <input type="hidden" name="${fieldName}[]" value="${value}">
                <button type="button" class="btn-close btn-close-white ms-1" style="font-size:0.6rem;" onclick="removeTag(this)"></button>
            `;
            container.appendChild(span);
            input.value = '';
        }

        function removeTag(btn) {
            btn.closest('span').remove();
        }

        // Allow pressing Enter on the input fields to add a tag
        document.getElementById('newLoginMethod').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') { e.preventDefault(); addTag('newLoginMethod', 'loginMethodTags', 'login_methods'); }
        });
        document.getElementById('newServer').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') { e.preventDefault(); addTag('newServer', 'serverTags', 'servers'); }
        });
    </script>
@endsection
