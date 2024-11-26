@extends('layouts.app')

@section('title', 'Article')

@push('style')
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
                <div class="center-btn" style="margin-bottom: 1cm; display: flex; justify-content: center; align-items: center; height: 1cm;">
                    <a href="{{ route('mushroom.create') }}" class="btn btn-primary">Add Mushroom</a>
                </div>

                <div class="row">
                  @foreach ($mushrooms as $mushroom)
                  <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image" style="background-image: url('{{ asset($mushroom->photo) }}');">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">{{$mushroom->name}}</a></h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>{{ Str::limit($mushroom->description, 100) }}</p>
                            <div class="article-cta">
                                <!-- Tombol Read More yang memicu modal -->
                                <a href="#"
                                   class="btn btn-primary"
                                   data-toggle="modal"
                                   data-target="#readMoreModal"
                                   data-name="{{ $mushroom->name }}"
                                   data-description="{{ $mushroom->description }}"
                                   data-photo="{{ asset($mushroom->photo) }}">Read More</a>
                            
                                <a href="{{ route('mushroom.edit', $mushroom->id) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                    </article>
                  </div>
                  @endforeach
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
    <!-- JS Libraries -->
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
