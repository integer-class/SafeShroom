@extends('layouts.app')

@section('title', 'Summary Results')

@push('style')
    <!-- Tambahkan library CSS jika diperlukan -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Summary Results</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="center-btn" style="margin-bottom: 1cm; display: flex; justify-content: center;">
                    <a href="{{ route('summary-results.create') }}" class="btn btn-primary">Add Summary</a>
                </div>

                @if ($summaryResults->isEmpty())
                    <p>No summary results available.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mushroom Name</th>
                                    <th>Summary</th>
                                    <th>Photo</th> <!-- Kolom Foto Ditambahkan -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($summaryResults as $result)
                                    <tr>
                                        <td>{{ $result->id }}</td>
                                        <td>{{ $result->mushroom->name }}</td>
                                        <td>{{ Str::limit($result->mushroom->description, 100) }}</td> <!-- Menampilkan description dari Mushroom -->
                                        <td>
                                            @if($result->mushroom->photo)
                                                <img src="{{ asset('storage/' . $result->mushroom->photo) }}" alt="Photo" style="width: 100px; height: 100px; object-fit: cover;">
                                            @else
                                                <span>No Photo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('summary-results.edit', $result->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('summary-results.destroy', $result->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan library JS jika diperlukan -->
@endpush
