@extends('dashboard.components.main')
@section('title')
    - Tambah Game Baru
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
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
                    <form id="addGameForm">
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="gameName" class="form-label">Game Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="gameName" placeholder="Enter game name"
                                        required />
                                </div>

                                <div class="mb-3">
                                    <label for="gameGenre" class="form-label">Genre</label>
                                    <select class="form-select" id="gameGenre">
                                        <option value="">Select Genre</option>
                                        <option value="MOBA">MOBA</option>
                                        <option value="FPS">FPS</option>
                                        <option value="RPG">RPG</option>
                                        <option value="Battle Royale">Battle Royale</option>
                                        <option value="RTS">RTS</option>
                                        <option value="Card Game">Card Game</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="gameDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="gameDescription" rows="4" placeholder="Enter game description"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Game Image</label>
                                    <div class="card p-3 bg-light">
                                        <div class="text-center mb-3">
                                            <img src="https://placehold.co/200x200?text=Game+Image" id="imagePreview"
                                                class="img-fluid rounded border" style="max-height: 200px; width: auto" />
                                        </div>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="gameImage" accept="image/*" />
                                            <button type="button" class="btn btn-outline-secondary" id="removeImage">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <small class="text-muted mt-2">Recommended size: 500x500px. Max file size:
                                            2MB</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="gameLabels" class="form-label">Labels</label>
                                    <select class="form-select" id="gameLabels" multiple>
                                        <option value="1">Featured</option>
                                        <option value="2">Trending</option>
                                        <option value="3">Popular</option>
                                        <option value="4">New Release</option>
                                        <option value="5">Esports</option>
                                    </select>
                                    <small class="text-muted">Hold Ctrl (CMD on Mac) to select multiple</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="form-footer">
                    <button type="button" class="btn btn-outline-secondary">
                        Cancel
                    </button>
                    <button type="submit" form="addGameForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Game
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
