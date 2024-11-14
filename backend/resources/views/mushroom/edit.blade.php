@extends('layouts.app')

@section('title', 'Edit Mushroom')

@push('style')
    <!-- Tambahkan CSS jika diperlukan -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Mushroom</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Mushrooms</a></div>
                    <div class="breadcrumb-item">Edit Mushroom</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <!-- Card untuk Form Edit Mushroom -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Mushroom</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('mushroom.update', $mushroom->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                
                                    <div class="row">
                                        <!-- Nama Jamur -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Mushroom Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $mushroom->name) }}" required>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <!-- Deskripsi -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $mushroom->description) }}</textarea>
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
                                                @if ($mushroom->photo)
                                                    <small>Current photo:</small>
                                                    <img src="{{ asset('storage/photos/' . $mushroom->photo) }}" alt="Current Mushroom Photo" width="100">
                                                @endif
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
                                                    <option value="1" {{ old('is_poisonous', $mushroom->is_poisonous) == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ old('is_poisonous', $mushroom->is_poisonous) == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                                @error('is_poisonous')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                
                                        <!-- Tombol Submit -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                <a href="{{ route('mushroom.index') }}" class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                <!-- Form Delete Terpisah -->
                                <form action="{{ route('mushroom.destroy', $mushroom->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mushroom?')">Delete</button>
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
