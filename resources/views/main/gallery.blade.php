@extends('main.layout')

@section('styles')
    <style>
            #header {
                background-color: #904E65;
            }
    </style>
@endsection

@section('content')
<div class="container service-container">
    <header class="section-header">
        <h3>Gallery</h3>
    </header>

<!-- Portfolio Section -->
<section id="portfolio"  class="section-bg" >
    <div class="container">
        <div class="row portfolio-container">
            @foreach ($image as $this_image)
                    <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="{{url('/')}}{{$this_image->image}}" class="img-fluid" alt="">
                                <a href="{{url('/')}}{{$this_image->image}}" data-lightbox="portfolio" data-title="{{$this_image->project->title}}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                <a href="{{route('service', ['id'=> $this_image->project->service->id])}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </figure>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</section>

</div>    
@endsection