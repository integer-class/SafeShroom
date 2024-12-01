@extends('layouts.app')

@section('title', 'Edit Article')

@push('style')
    <!-- Tambahkan CSS jika diperlukan -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Article</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Articles</a></div>
                    <div class="breadcrumb-item">Edit Article</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <!-- Card untuk Form Edit Article -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Article</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <!-- Title Article -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="title">Article Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $article->title) }}" required>
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $article->content) }}</textarea>
                                                @error('content')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Featured Image -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="image">Featured Image</label>
                                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                @if ($article->image)
                                                    <small>Current image:</small>
                                                    <img src="{{ asset('storage/images/' . $article->image) }}" alt="Current Featured Image" width="100">
                                                @endif
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Form Delete Terpisah -->
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
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
    <!-- Tambahkan JavaScript jika diperlukan -->
@endpush
