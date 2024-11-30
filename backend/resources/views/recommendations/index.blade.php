@extends('layouts.app')

@section('title', 'Recommendation')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main') 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Recommendation</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="center-btn" style="margin-bottom: 1cm; display: flex; justify-content: center; align-items: center; height: 1cm;">
                    <a href="{{ route('recommendations.create') }}" class="btn btn-primary">Add Recommendation</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recommendations as $index => $recommendation)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ $recommendation->photo ? asset('storage/' . $recommendation->photo) : 'https://via.placeholder.com/50' }}" 
                                             alt="Recommendation Image" class="img-thumbnail" style="width: 50px; height: 50px;">
                                    </td>
                                    <td>{{ $recommendation->title }}</td>
                                    <td>{{ Str::limit($recommendation->description, 50) }}</td>
                                    <td>
                                        <a href="#"
                                           class="btn btn-primary btn-sm"
                                           data-toggle="modal"
                                           data-target="#readMoreModal"
                                           data-title="{{ $recommendation->title }}"
                                           data-description="{{ $recommendation->description }}"
                                           data-photo="{{ $recommendation->photo ? asset('storage/' . $recommendation->photo) : 'https://via.placeholder.com/300' }}">
                                            Read More
                                        </a>
                                        <a href="{{ route('recommendations.edit', $recommendation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('recommendations.destroy', $recommendation->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this recommendation?')">Delete</button>
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

    <!-- Modal untuk detail rekomendasi -->
    <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="readMoreModalLabel">Detail Recommendation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalPhoto" src="" alt="Recommendation Image" class="img-fluid mb-3" />
                    <h5 id="modalTitle"></h5>
                    <p id="modalDescription"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
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
