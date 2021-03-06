@extends('main.layout')

@section('header')
    @include('main.inc.header')
@endsection

@section('content')

<!-- Intro section with Slider -->
<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        @foreach ($sliders as $key => $slider)
            @if ($key == 0)
                <div class="carousel-item active" style='background-image: url("{{get_slider_image($slider->image)}}");'>              
            @else
                <div class="carousel-item" style='background-image: url("{{get_slider_image($slider->image)}}");'>             
            @endif
            <div class="carousel-container">
                <div class="carousel-content">
                    <h2>{{ $slider->title }}</h2>
                    <p>
                    {{ $slider->description }}
                    </p>
                </div>
            </div>
            </div>            
        @endforeach


        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        </div>
    </div>
</section>
    
<main id="main">    
    <!-- About Us section -->
    <section id="about">
        <div class="container">

            <header class="section-header">
            <h3>About Us</h3>
            </header>

            <div class="row about-cols">          
            @foreach ($about as $key => $about_item)
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="{{ 0.1*$key }}s">
                <div class="about-col">
                    <div class="img">
                    <img src="{{get_about_image($about_item->image)}}" alt="" class="img-fluid">
                        <div class="icon"><i class="ion-ios-list-outline"></i></div>
                    </div>
                    <h2 class="title">{{ $about_item->title }}</h2>
                    <p>
                    {!! $about_item->description !!}
                    </p>
                </div>
                </div>
            @endforeach
            </div> 
        </div>
    </section>
        
    <!-- Our Team Section -->
    <section id="team">
        <div class="container">
            <header class="section-header wow fadeInUp">
            <h3>{{ $team[0]->title }}</h3>
            <p>
                {!! $team[0]->description !!}
            </p>
            </header>
        </div>
    </section>
               
    <!-- Facts Section-->
    <section id="facts"  class="wow fadeIn">
        <div class="container">

            <header class="section-header">
            <h3>Facts</h3>
            </header>

            <div class="row counters">
                <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">{{ $fact[0]->num_one }}</span>
                <p>{{ $fact[0]->fact_one }}</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">{{ $fact[0]->num_two }}</span>
                <p>{{ $fact[0]->fact_two }}</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">{{ $fact[0]->num_three }}</span>
                <p>{{ $fact[0]->fact_three }}</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up">{{ $fact[0]->num_four }}</span>
                <p>{{ $fact[0]->fact_four }}</p>
                </div>
            </div>
            <div class="facts-img">
            <img src="{{url('/')}}/main_assets/img/facts-img.png" alt="" class="img-fluid">
            </div>  
        </div>
    </section>
        
    <!-- Portfolio Section -->
    <section id="portfolio"  class="section-bg" >
        <div class="container">

            <!-- Portfolio header -->
            <header class="section-header">
            <h3 class="section-title">Our Portfolio</h3>
            </header>

            <!-- Portfolio Filters -->
            <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($services as $service)
                        <li data-filter=".filter-{{$service->id}}">{{$service->name}}</li>   
                    @endforeach
                </ul>
            </div>
            </div>

            <div class="row portfolio-container">

                @foreach ($image as $this_image)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{$this_image->project->service->id}} wow fadeInUp">
                            <div class="portfolio-wrap">
                            <figure>
                                <img src="{{get_projects_image($this_image->image)}}" class="img-fluid" alt="">
                                <a href="{{get_projects_image($this_image->image)}}" data-lightbox="portfolio" data-title="{{$this_image->project->title}}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                <a href="{{route('project', ['id'=> $this_image->project_id])}}" target="_blank" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </figure>
            
                            <div class="portfolio-info">
                                <h4><a href="{{route('project', ['id'=>$this_image->project_id])}}" target="_blank">{{ Str::words($this_image->project->title, 4) }}</a></h4>
                                <p>{{$this_image->project->service->name}}</p>
                            </div>
                            </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
               
    <!-- Partners Section -->
    <section id="clients" class="wow fadeInUp">
        <div class="container">
            <header class="section-header">
            <h3>Our Partners</h3>
            </header>

            <div class="owl-carousel clients-carousel">
                @foreach ($partner as $partner_item)
                    @if($partner_item->url !== null)
                        <a href="{{$partner_item->url}}" target="_blank">
                    @endif
                        <img src="{{get_partners_image($partner_item->image)}}" alt="">
                    @if($partner_item->url !== null)
                        </a>
                    @endif   
                @endforeach
            </div>
        </div>
    </section>
        
    <!-- Contact Us Section -->
    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">

            <div class="section-header">
            <h3>Contact Us</h3>
            <p>{{ $contact[0]->description }}</p>
            </div>

            <div class="row contact-info">

            <div class="col-md-4">
                <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Address</h3>
                <address>{{ $contact[0]->address }}</address>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Phone Number</h3>
                <p><a href="tel:+155895548855">{{ $contact[0]->phone }}</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="{{ $contact[0]->email }}">{{ $contact[0]->email }}</a></p>
                </div>
            </div>

            </div>

            <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage">
            </div>

            @include('errors')

            <form action="{{route('sendMessage')}}" method="post" role="form" class="contactForm">
                @csrf
                <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{old('name')}}"/>
                    <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{old('email')}}"/>
                    <div class="validation"></div>
                </div>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="{{old('subject')}}"/>
                <div class="validation"></div>
                </div>
                <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message">{{old('message')}}</textarea>
                <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
            </div>

        </div>
    </section>   
</main>

<script>
    var hash = window.location.hash;
    if(hash == "#team" || hash == "#portfolio" || hash == "#partners" || hash == "#contact" || hash == "#about"){
        document.querySelector('#header').className += "header-scrolled";
    }
</script>

@endsection


  

