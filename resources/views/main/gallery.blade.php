@extends('main.layout')

@section('styles')
    <link rel="stylesheet" href="{{url('/')}}/main_assets/css/custom-menu.css">
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
                                <img src="{{url('/')}}{{$this_image->image}}" class="img-fluid" alt="">
                                <a href="{{url('/')}}{{$this_image->image}}" data-lightbox="portfolio" data-title="{{$this_image->project->title}}" class="link-preview link-preview-centered" title="Preview"><i class="ion ion-eye"></i></a>
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


