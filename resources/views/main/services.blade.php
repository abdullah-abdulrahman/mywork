@extends('main.layout')

@section('header')
    @include('main.inc.othersheader')
@endsection


@section('content')
<div class="container services-container">
    <section id="srevices">
        <div class="container">
            <div class="row srevices-cols">          
                @foreach ($services as $service)
                    <div class="col-md-4 wow fadeInUp mb-5" data-wow-delay="0.1s">
                    <div class="srevices-col">
                        <div class="img">
                            <img src="{{get_services_image($service->image)}}" alt="" class="img-fluid">
                        </div>
                        <h2 class="title">{{ Str::words($service->name, 3) }}</h2>
                        <p class="text-center">
                            {{ Str::words($service->brief_description, 7) }}<br>
                            <a href="{{route('service', ['id'=> $service->id])}}" class="btn btn-primary mt-3" role="button">Show Service</a>
                        </p>
                    </div>
                    </div>
                @endforeach
            </div> 
        </div>
    </section>
</div>

<script>
    document.querySelector('#home').className = "";
    document.querySelector('.menu-has-children').className = "menu-active";
</script>
@endsection