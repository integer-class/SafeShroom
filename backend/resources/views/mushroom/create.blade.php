@extends('layouts.app')

@section('title', 'Create Mushroom')

@push('style')
    <!-- Tambahkan CSS untuk styling jika diperlukan -->
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
                        <!-- Card untuk Form Create Mushroom -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Create New Mushroom</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('mushroom.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <!-- Nama Jamur -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Mushroom Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter mushroom name" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Deskripsi -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter mushroom description" required>{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Foto Jamur -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="photo">Mushroom Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                                @error('photo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Status Beracun -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="is_poisonous">Is Poisonous</label>
                                                <select class="form-control" id="is_poisonous" name="is_poisonous" required>
                                                    <option value="1" {{ old('is_poisonous') == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ old('is_poisonous') == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                                @error('is_poisonous')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Tombol Submit -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save Mushroom</button>
                                                <a href="{{ route('mushroom.index') }}" class="btn btn-secondary">Cancel</a>
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
    <!-- Tambahkan JS untuk validasi atau interaksi lainnya jika diperlukan -->
@endpush
