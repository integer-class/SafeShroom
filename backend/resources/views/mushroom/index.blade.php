@extends('layouts.app')

@section('title', 'Article')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main') 
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Article</h1>
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
                            <p>{{$mushroom->description}}</p>
                            <div class="article-cta">
                                <a href="#"
                                    class="btn btn-primary">Read More</a>
                            
                                <a href="{{ route('mushroom.edit', $mushroom->id) }}" 
                                   class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                    </article>
                </div>
                  @endforeach
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
