@extends('main.layout')

@section('styles')
    <style>
        #header {
            background-color: #904E65;
        }
    </style>
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
                            <img src="{{url('/')}}{{$service->image}}" alt="" class="img-fluid">
                        </div>
                        <h2 class="title">{{$service->name}}</h2>
                        <p class="text-center">
                            {{$service->description}} <br>
                            <a href="{{route('service', ['id'=> $service->id])}}" class="btn btn-primary mt-3" role="button">Show Service</a>
                        </p>
                    </div>
                    </div>
                @endforeach
            </div> 
        </div>
    </section>
</div>
@endsection