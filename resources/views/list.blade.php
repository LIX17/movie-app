@extends('layout.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">                
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>{{ $slug }}</h4>
                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        @foreach ($list as $row)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="https://image.tmdb.org/t/p/w500/{{ $row->poster_path }}">
                                        <div class="ep" {{ $row->adult==true ? '' : 'hidden' }}>R</div>                                        
                                        <div class="comment"><i class="fa fa-star"></i> {{ $row->vote_average }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{ $row->vote_count }}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <h5><a href="{{ route('detail', $row->id) }}">{{ $row->original_title }}</a></h5>
                                        <ul>
                                            @foreach ($genres as $genre)
                                                <li {{ in_array($genre->id, $row->genre_ids)?'':'hidden'}}>{{ $genre->name }}</li>    
                                            @endforeach                                            
                                        </ul>                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach                        
                    </div>
                </div>               
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

{{-- Scroll Top Button --}}
<div class="fixed-bottom d-flex justify-content-center">
    <a class="rounded-circle scroll-up" href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
</div>
@endsection