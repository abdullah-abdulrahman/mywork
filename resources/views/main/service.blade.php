@extends('main.layout')

@section('header')
    @include('main.inc.othersheader')
@endsection


@section('content')
<div class="container service-container">
    <header class="section-header">
        <h3>{{ $service->name }}</h3>
    </header>
    <img src="{{get_services_image($service->image)}}" class="service-image wow fadeInUp"> <br>
    <p class="mt-3">{!! $service->description !!}</p>
    
@if($count > 0)
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
                                <img src="{{get_projects_image($this_image->image)}}" class="img-fluid" alt="">
                                    <a href="{{get_projects_image($this_image->image)}}" data-lightbox="portfolio" data-title="{{$this_image->project->title}}" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
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

<div class="text-center mb-5">
    <a href="{{route('allServices')}}" class="btn btn-lg btn-primary">Back to Services</a>
</div>


</div>  

<script>
    document.querySelector('#home').className = "";
    document.querySelector('.menu-has-children').className = "menu-active";
</script>
@endsection