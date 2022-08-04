@extends('layout.app')

@section('title')
    {{ $title }}
@endsection

@push('addon-style')
<style>
    .hero__text h2,p{
        text-shadow: 2px 2px rgb(58, 50, 50);
    }
</style>
@endpush

@section('content')
 <!-- Carousel/Slider -->
<section class="hero">
    <div class="container" style="margin-top: 2vh !important">
        <div class="hero__slider owl-carousel">
            @if ($now_playing)
                @for($i=0; $i<6; $i++)
                    <div class="hero__items set-bg" data-setbg="https://image.tmdb.org/t/p/w500/{{ $now_playing[$i]->backdrop_path }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero__text">
                                    {{-- <div class="label">Adventure</div> --}}
                                    <h2>{{ $now_playing[$i]->original_title }}</h2>
                                    <p>{{ Str::limit($now_playing[$i]->overview , 120, '...') }}</p>
                                    <a href="{{ route('detail', $now_playing[$i]->id) }}"><span>Read More</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>    
                @endfor            
            @endif
                  
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{-- now playing --}}
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Now Playing</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="{{ route('list', 'now_playing') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($now_playing as $row)
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
                {{-- popular --}}
                <div class="popular__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Popular</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#{{ route('list', 'popular') }} class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($popular as $row)
                        <div class="col-lg-4 col-md-6 col-sm-6">
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
                {{-- top rated --}}
                <div class="recent__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Top Rated</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="{{ route('list', 'top_rated') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($top_rated as $row)
                            <div class="col-lg-4 col-md-6 col-sm-6">
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
                {{-- upcoming --}}
                <div class="live__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Upcoming</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="{{ route('list', 'upcoming') }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($upcoming as $row)
                            <div class="col-lg-4 col-md-6 col-sm-6">
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

            {{-- sidebar --}}
            {{-- <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Trending</h5>
                        </div>
                        <ul class="filter__controls">                            
                            <li class="active" data-filter=".day">Daily</li>
                            <li data-filter=".week">Weekly</li>                            
                        </ul>
                        <div class="filter__gallery"> 
                            @foreach ($daily as $row)
                                <div class="product__sidebar__view__item set-bg mix day" data-setbg="https://image.tmdb.org/t/p/w500/{{ $row->poster_path }}">
                                    <div class="ep" {{ $row->adult==true ? '' : 'hidden' }}>R</div>  
                                    <div class="view"><i class="fa fa-eye"></i> {{ $row->vote_count }}</div>
                                    <h5><a href="#">{{ $row->tittle }}</a></h5>
                                </div>  
                            @endforeach                       
                            @foreach ($weekly as $row)
                                 <div class="product__sidebar__view__item set-bg mix week" data-setbg="https://image.tmdb.org/t/p/w500/{{ $row->poster_path }}">
                                    <div class="ep" {{ $row->adult==true ? '' : 'hidden' }}>R</div>  
                                    <div class="view"><i class="fa fa-eye"></i> {{ $row->vote_count }}</div>
                                    <h5><a href="#"></a></h5>
                                </div>  
                            @endforeach                       
                                                   
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Product Section End -->

{{-- Scroll Top Button --}}
<div class="fixed-bottom d-flex justify-content-center">
    <a class="rounded-circle scroll-up" href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
</div>
@endsection