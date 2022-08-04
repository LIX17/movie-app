@extends('layout.app')

@section('title')
    {{ $title }}
@endsection

@push('addon-style')

@endpush

@section('content')

 <!-- Blog Details Section Begin -->
    <section class="blog-details spad mb-0 pb-0">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__title">                        
                        <h2>CONTACT</h2>
                        <div class="blog__details__social">
                            <a href="#" class="facebook"><i class="fa fa-facebook-square"></i> Facebook</a>
                            <a href="#" class="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin-square"></i> Linkedin</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
                        </div>
                    </div>
                </div>    
                <div class="col-lg-8">
                    <div class="blog__details__content">                        
                        <div class="blog__details__btns">                            
                            <div class="blog__details__form">
                                <h4>Leave A Message</h4>
                                <form action="{{ Route('contact-form') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 4vh !important">
                                            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">                                           
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>                                                                         
                                        <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 4vh !important">
                                            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12" style="padding-bottom: 4vh !important">
                                            <textarea placeholder="Message" name="message" >{{ old('message') }}</textarea>
                                            @error('message')
                                                <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="site-btn">Send Message</button>
                                        </div>                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection

@push('addon-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let session = "{{ Session::get('success') }}";
        
        if(session !== "" && session !== null)
        {
            $(document).ready(function(){
                Swal.fire(
                    'Success!',
                    session,
                    'success'
                );
            }); 
        }
    </script>
@endpush