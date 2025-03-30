@extends('dashboard.components.main')
@section('title')
    - Add New Rank Tier
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
                <h1 class="mb-0 fw-bold">Add New Rank Tier</h1>
                <div>
                    <a href="{{ route('dashboard.rank-tier') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Rank Tiers
                    </a>
                </div>
            </div>

            <!-- Add Rank Tier Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Rank Tier Information</h5>
                </div>
                <div class="form-container">
                    <form id="addRankTierForm" action="{{ route('dashboard.rank-tier.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <!-- Rank Category Selection -->
                                <div class="mb-3">
                                    <label for="game_rank_category_id" class="form-label">
                                        Select Rank Category <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="game_rank_category_id" id="game_rank_category_id"
                                        required>
                                        <option value="">-- Select Rank Category --</option>
                                        @foreach ($rankCategories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('game_rank_category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }} - {{ $category->game->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Tier -->
                                <div class="mb-3">
                                    <label for="tier" class="form-label">
                                        Tier <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="tier" id="tier"
                                        placeholder="Enter tier (e.g. I, II, III...)" required value="{{ old('tier') }}">
                                </div>
                                <!-- Progress Target -->
                                <div class="mb-3">
                                    <label for="progress_target" class="form-label">
                                        Progress Target
                                    </label>
                                    <input type="number" class="form-control" name="progress_target" id="progress_target"
                                        placeholder="Enter progress target" value="{{ old('progress_target') }}">
                                </div>
                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">
                                        Price
                                    </label>
                                    <input type="number" class="form-control" name="price" id="price"
                                        placeholder="Enter price" value="{{ old('price') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.history.back();">
                        Cancel
                    </button>
                    <button type="submit" form="addRankTierForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Rank Tier
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
