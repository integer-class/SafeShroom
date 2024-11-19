@extends('layouts.app')

@section('title', 'Create New Article')

@push('style')
    <!-- Add custom styles if needed -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create New Article</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Articles</a></div>
                    <div class="breadcrumb-item">Create Article</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <!-- Card for Create Article Form -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Create New Article</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter article title" value="{{ old('title') }}" required>
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" placeholder="Enter article content" required>{{ old('content') }}</textarea>
                                                @error('content')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Photo Upload -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Article Photo</label>
                                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                                                @error('photo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save Article</button>
                                                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- Add custom JavaScript if needed -->
@endpush
