@extends('layouts.app')

@section('title', 'Edit Recommendation')

@push('style')
    <!-- Tambahkan CSS jika diperlukan -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Recommendation</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Recommendations</a></div>
                    <div class="breadcrumb-item">Edit Recommendation</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <!-- Card untuk Form Edit Recommendation -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Recommendation</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('recommendations.update', $recommendation->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <!-- Title Recommendation -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="title">Recommendation Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $recommendation->title) }}" required>
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                    <!-- Deskripsi -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="steps">Description</label>
                                                <textarea class="form-control" id="steps" name="steps" rows="5" required>{{ old('steps', $recommendation->description) }}</textarea>
                                                @error('steps')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Foto Jamur -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Mushroom Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                                @if ($mushroom->photo)
                                                    <small>Current photo:</small>
                                                    <img src="{{ asset('storage/photos/' . $mushroom->photo) }}" alt="Current Mushroom Photo" width="100">
                                                @endif
                                                @error('photo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Tombol Submit -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                <a href="{{ route('recommendations.index') }}" class="btn btn-secondary">Cancel</a>
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
    <!-- Tambahkan JS jika diperlukan -->
@endpush
