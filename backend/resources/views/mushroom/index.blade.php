@extends('layouts.app')

@section('title', 'Mushroom Data')

@push('style')
<!-- Tambahkan gaya khusus jika diperlukan -->
@endpush

@section('main') 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mushroom Data</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="center-btn" style="margin-bottom: 1cm; display: flex; justify-content: center; align-items: center;">
                    <a href="{{ route('mushroom.create') }}" class="btn btn-primary">Add Mushroom</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mushrooms as $mushroom)
                            <tr>
                                <td>
                                    <img src="{{ asset($mushroom->photo) }}" alt="Photo" style="width: 100px; height: auto; border-radius: 8px;">
                                </td>
                                <td>{{ $mushroom->name }}</td>
                                <td>{{ Str::limit($mushroom->description, 50) }}</td>
                                <td>
                                    <a href="#"
                                       class="btn btn-primary btn-sm"
                                       data-toggle="modal"
                                       data-target="#readMoreModal"
                                       data-name="{{ $mushroom->name }}"
                                       data-description="{{ $mushroom->description }}"
                                       data-photo="{{ asset($mushroom->photo) }}">Read More</a>
                                    <a href="{{ route('mushroom.edit', $mushroom->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal untuk menampilkan detail jamur -->
    <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="readMoreModalLabel">Detail Jamur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalPhoto" src="" alt="Gambar Jamur" class="img-fluid mb-3" />
                    <h5 id="modalName"></h5>
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
        var name = button.data('name'); 
        var description = button.data('description'); 
        var photo = button.data('photo'); 

        var modal = $(this);
        modal.find('.modal-title').text('Detail: ' + name);
        modal.find('#modalName').text(name);
        modal.find('#modalDescription').text(description);
        modal.find('#modalPhoto').attr('src', photo);
    });
</script>
@endpush
