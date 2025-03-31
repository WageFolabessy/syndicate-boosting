@extends('dashboard.components.main')
@section('title')
    - Add New Rank Tier Detail
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
                <h1 class="mb-0 fw-bold">Add New Rank Tier Detail</h1>
                <div>
                    <a href="{{ route('dashboard.rank-tier-detail') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Rank Tier Details
                    </a>
                </div>
            </div>

            <!-- Add Rank Tier Detail Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Rank Tier Detail Information</h5>
                </div>
                <div class="form-container">
                    <form id="addRankTierDetailForm" action="{{ route('dashboard.rank-tier-detail.store') }}"
                        method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <!-- Rank Tier Selection -->
                                <div class="mb-3">
                                    <label for="game_rank_tier_id" class="form-label">
                                        Select Rank Tier <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select mb-3" name="game_rank_tier_id" id="game_rank_tier_id"
                                        required>
                                        <option value="">-- Select Rank Tier --</option>
                                        @foreach ($rankTiers as $tier)
                                            <option value="{{ $tier->id }}"
                                                {{ old('game_rank_tier_id') == $tier->id ? 'selected' : '' }}>
                                                {{ $tier->tier }} - {{ $tier->rankCategory->name }} -
                                                {{ $tier->rankCategory->game->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Star Number -->
                                <div class="mb-3">
                                    <label for="star_number" class="form-label">
                                        Star Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="star_number" id="star_number"
                                        placeholder="Enter star number (e.g., 1, 2, 3)" required
                                        value="{{ old('star_number') }}">
                                </div>

                                <!-- Price (Cost per star/point) -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">
                                        Price (per star/point)
                                    </label>
                                    <input type="number" class="form-control" name="price" id="price"
                                        placeholder="Enter price" value="{{ old('price') }}">
                                </div>

                                <!-- Display Order -->
                                <div class="mb-3">
                                    <label for="display_order" class="form-label">
                                        Display Order
                                    </label>
                                    <input type="number" class="form-control" name="display_order" id="display_order"
                                        placeholder="Enter display order" value="{{ old('display_order', 0) }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.history.back();">
                        Cancel
                    </button>
                    <button type="submit" form="addRankTierDetailForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save Rank Tier Detail
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
