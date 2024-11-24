@extends('layouts.app')

@section('title', 'Add Summary Result')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Summary Result</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('summary-results.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="mushroom_id">Mushroom</label>
                    <select name="mushroom_id" id="mushroom_id" class="form-control">
                        @foreach ($mushrooms as $mushroom)
                            <option value="{{ $mushroom->id }}">{{ $mushroom->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <textarea name="summary" id="summary" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </section>
</div>
@endsection
