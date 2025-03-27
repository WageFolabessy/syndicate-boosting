@extends('dashboard.components.main')
@section('title')
    - Edit FAQ
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
                <h1 class="mb-0 fw-bold">Edit FAQ</h1>
                <div>
                    <a href="{{ route('dashboard.faq') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to FAQ's
                    </a>
                </div>
            </div>

            <!-- Edit FAQ Form -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">FAQ Information</h5>
                </div>
                <div class="form-container">
                    <form id="editFaqForm" action="{{ route('dashboard.faq.update', $faq->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-12 col-md-12">
                                <!-- Question -->
                                <div class="mb-3">
                                    <label for="question" class="form-label">Question</label>
                                    <textarea class="form-control" name="question" id="question" rows="4" placeholder="Enter question">{{ old('question', $faq->question) }}</textarea>
                                </div>
                                <!-- Answer -->
                                <div class="mb-3">
                                    <label for="answer" class="form-label">Answer</label>
                                    <textarea class="form-control" name="answer" id="answer" rows="4" placeholder="Enter answer">{{ old('answer', $faq->answer) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" onclick="window.history.back()">Cancel</button>
                    <button type="submit" form="editFaqForm" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update FAQ
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
