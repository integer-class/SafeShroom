@extends('layouts.app')

@section('title', 'Articles')

@push('styles')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Articles</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="center-btn" style="margin-bottom: 1cm; display: flex; justify-content: center; align-items: center; height: 1cm;">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary">Add Article</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Excerpt</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $index => $article)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></td>
                                    <td>
                                        <img src="{{ $article->photo ? asset('storage/' . $article->photo) : 'https://via.placeholder.com/100' }}" alt="Photo" style="width: 100px; height: auto;">
                                    </td>
                                    <td>{{ Str::limit($article->content, 100) }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read More</a>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        // Modal handling (optional if you still want to use it)
        $('#readMoreModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var description = button.data('description');
            var photo = button.data('photo');

            var modal = $(this);
            modal.find('.modal-title').text('Detail: ' + title);
            modal.find('#modalTitle').text(title);
            modal.find('#modalDescription').text(description);
            modal.find('#modalPhoto').attr('src', photo);
        });
    </script>
@endpush
