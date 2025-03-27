@extends('dashboard.components.main')
@section('title')
    - Add New FAQ
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
                <h1 class="mb-0 fw-bold">Add New FAQ</h1>
                <div>
                    <a href="{{ route('dashboard.faq') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to FAQ's
                    </a>
                </div>
            </div>

            <!-- Add Rank Tier Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Rank Tier Information</h5>
                </div>
                <div class="form-container">
                    <form id="addFaqForm" action="{{ route('dashboard.faq.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12 col-md-12">
                                <!-- Question -->
                                <div class="mb-3">
                                    <label for="question" class="form-label">Question</label>
                                    <textarea class="form-control" name="question" id="question" rows="4" placeholder="Enter game question">{{ old('question') }}</textarea>
                                </div>
                                <!-- Answer -->
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer</label>
                                    <textarea class="form-control" name="answer" id="answer" rows="4" placeholder="Enter game answer">{{ old('answer') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary"
                        onclick="window.history.back();">Cancel</button>
                    <button type="submit" form="addFaqForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Save FAQ
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
