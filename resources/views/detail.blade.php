@extends('layout.app')

@section('title')
    {{ ($title) }}
@endsection

@section('content')
    <!-- Detail Section Begin -->
    <section class="anime-details spad" style="padding-bottom: 0 !important">
        <div class="container" style="margin-top: 2vh !important">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="https://image.tmdb.org/t/p/w500/{{ $detail->poster_path }}">
                            {{-- <div class="comment"><i class="fa fa-star"></i> {{ $detail->vote_average }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $detail->vote_count }}</div> --}}
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $detail->original_title }}</h3>
                                <span>{{ $detail->tagline }}</span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star">{{ $detail->vote_average }}/10</i></a>                                  
                                </div>
                                <span>{{ $detail->vote_count }} Votes</span>
                            </div>
                            <p>{{$detail->overview}}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>                                            
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>Genres:</span></div>
                                                    <div class="col-8"> 
                                                        @foreach ($detail->genres as $idx => $row)
                                                            {{ (($idx>0)?', ':'').$row->name }}
                                                        @endforeach                                                    
                                                    </div>
                                                </div>                                                                                       
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>Studios:</span></div>
                                                    <div class="col-8"> 
                                                        @foreach ($detail->production_companies as $idx => $row)
                                                            {{ (($idx>0)?', ':'').$row->name }}
                                                        @endforeach 
                                                    </div>
                                                </div>                                                                                       
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>Date Aired:</span></div>
                                                    <div class="col-8"> 
                                                        {{ $detail->release_date }}
                                                    </div>
                                                </div>                                                                                       
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>Status:</span></div>
                                                    <div class="col-8"> 
                                                        {{ $detail->status }} 
                                                    </div>
                                                </div>                                                                                       
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>Duration:</span></div>
                                                    <div class="col-8"> 
                                                        {{ $detail->runtime }} mins
                                                    </div>
                                                </div>                                                                                       
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>Budget:</span></div>
                                                    <div class="col-8"> 
                                                        $ {{ number_format($detail->budget, 2) }}                                                        
                                                    </div>
                                                </div>                                                                                       
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>Revenue:</span></div>
                                                    <div class="col-8"> 
                                                        $ {{ number_format($detail->revenue, 2) }}
                                                    </div>
                                                </div>                                                                                       
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4"><span>IMDB:</span></div>
                                                    <div class="col-8"> 
                                                        <a href="https://www.imdb.com/title/{{ $detail->imdb_id }}" target="_blank">Visit-IMDB</a>                                                        
                                                    </div>
                                                </div>                                                                                       
                                            </li>                                                                                                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">                                
                                <a href="{{ $detail->homepage }}" class="watch-btn" target="_blank"><span>Visit Official Page</span> <i
                                    class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-lg-12">
                <div class="anime__details__text">
                    <div class="anime__details__title">
                        <h3>Teaser Video</h3>
                    </div>
                </div>
                <div class="anime__video__player embed-responsive embed-responsive-16by9 d-flex justify-content-center">
                    @if ($video->results)
                        <iframe class="embed-responsive-item" id="player" allowfullscreen
                            src="https://www.youtube.com/embed/{{ $video->results[count($video->results)-1]->key }}">
                        </iframe>
                    @else
                        <img src="{{URL::asset('src/assets/no-video.png')}}" alt="video_unavailable">
                    @endif                   
                </div>    
                <div class="anime__details__btn d-flex justify-content-center mb-4 pb-2">                                
                    <a href="{{ route('detail', rand(0, 99999)) }}" class="watch-btn"><span>Check Random Movie</span> <i
                        class="fa fa-question px-2"></i></a>
                </div>             
            </div>
        </div>
    </section>
    <!-- Detail Section End -->
@endsection