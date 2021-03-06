@extends('main.layout')

@section('header')
    @include('main.inc.othersheader')
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
                    <div id="gallery-item" class="col-lg-4 col-md-6 portfolio-item wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="{{get_projects_image($this_image->image)}}" class="img-fluid" alt="">
                                <a href="{{get_projects_image($this_image->image)}}" data-lightbox="portfolio" data-title="{{$this_image->project->title}}" class="link-preview link-preview-centered" title="Preview"><i class="ion ion-eye"></i></a>
                            </figure>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</section>

</div> 

<script>
    document.querySelector('#home').className = "";
    document.querySelector('#gallery').className = "menu-active";
</script>
@endsection


