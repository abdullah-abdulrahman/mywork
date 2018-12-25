@extends('main.layout')

@section('header')
    @include('main.inc.othersheader')
@endsection


@section('content')
<div class="container service-container">
    <header class="section-header">
        <h3>{{ $service->name }}</h3>
    </header>
    <img src="{{url('/').IMAGES_PATH}}{{$service->image}}" class="service-image wow fadeInUp"> <br>
    <p class="mt-3">{!! $service->description !!}</p>
    
@if(count($image) > 0)
<!-- Portfolio Section -->
<section id="portfolio"  class="section-bg" >
    <div class="container">
        <!-- Portfolio header -->
        <header class="section-header">
        <h3 class="section-title">Projects</h3>
        </header>

        <div class="row portfolio-container">
            @foreach ($image as $this_image)
                @if($this_image->project->service->id == $id)
                    <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="{{url('/').IMAGES_PATH}}{{$this_image->image}}" class="img-fluid" alt="">
                                    <a href="{{url('/').IMAGES_PATH}}{{$this_image->image}}" data-lightbox="portfolio" data-title="{{$this_image->project->title}}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                                    <a href="{{route('project', ['id'=>$this_image->project_id])}}" target="_blank" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </figure>
            
                            <div class="portfolio-info">
                                <h4><a href="{{route('project', ['id'=>$this_image->project_id])}}" target="_blank">{{ Str::words($this_image->project->title, 4) }}</a></h4>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif

</div>  

<script>
    document.querySelector('#home').className = "";
    document.querySelector('.menu-has-children').className = "menu-active";
</script>
@endsection