@extends('layouts.app')

@section('title', 'Create Mushroom')

@push('style')
    <!-- Tambahkan gaya khusus jika dibutuhkan -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Mushroom</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Mushrooms</a></div>
                    <div class="breadcrumb-item">Create Mushroom</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <!-- Card for Create Mushroom Form -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Create New Mushroom</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('recommendations.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter mushroom title" value="{{ old('title') }}" required>
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter mushroom description" required>{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Mushroom -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="mushroom_id">Mushroom Type</label>
                                                <select class="form-control @error('mushroom_id') is-invalid @enderror" name="mushroom_id" id="mushroom_id" required>
                                                    <option value="" disabled selected>Select Mushroom</option>
                                                    @foreach ($mushrooms as $mushroom)
                                                        <option value="{{ $mushroom->id }}" {{ old('mushroom_id') == $mushroom->id ? 'selected' : '' }}>
                                                            {{ $mushroom->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('mushroom_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Mushroom Photo -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Mushroom Photo</label>
                                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                                                @error('photo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
1
                                        <!-- Save Button -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save Mushroom</button>
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
    <!-- Tambahkan skrip khusus jika dibutuhkan -->
@endpush
