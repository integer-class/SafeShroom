@extends('layouts.app')

@section('title', 'Edit Summary Result')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Summary Result</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('summary-results.update', $summaryResult->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="mushroom_id">Mushroom</label>
                    <select name="mushroom_id" id="mushroom_id" class="form-control">
                        @foreach ($mushrooms as $mushroom)
                            <option value="{{ $mushroom->id }}" {{ $summaryResult->mushroom_id == $mushroom->id ? 'selected' : '' }}>
                                {{ $mushroom->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <textarea name="summary" id="summary" class="form-control" rows="5">{{ $summaryResult->summary }}</textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @if ($summaryResult->photo)
                        <img src="{{ asset($summaryResult->photo) }}" alt="Photo" class="img-fluid mt-2" style="max-height: 150px;">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </section>
</div>
@endsection
