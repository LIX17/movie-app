@extends('layout.app')

@section('title')
    {{ $title }}
@endsection

@push('addon-style')
<style>
section{
    margin-bottom: 24vh !important;
}

.about p{
    margin: 2vh !important;
 }
.about h2{
    margin-top: 24vh !important;
 }
</style>
@endpush

@section('content')
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text about">
                        <h2>ABOUT</h2>
                        <p>Welcome</p>
                        <p>All data is gathered from <a href="https://www.themoviedb.org/" target="_blank">The Movie DB</a></p>
                        <p>This website is built by implementing <a href="https://themewagon.com/themes/free-bootstrap-4-html5-gaming-anime-website-template-anime/" target="_blank">Themewagon</a> template</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
@endsection