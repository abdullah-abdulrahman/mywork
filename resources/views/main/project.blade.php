@extends('main.layout')

@section('header')
    @include('main.inc.othersheader')
@endsection


@section('content')
<div class="container project-container">
    <header class="section-header">
        <h3>{{ $project->title }}</h3>
    </header>
    <img src="{{get_projects_image($project_image[0]->image)}}" class="service-image wow fadeInUp"> <br>
    <p class="mt-3">{!! $project->description !!}</p>
    <p class="mt-3 text-center text-muted">
        <small>
        Project uploaded at: {{ $project->created_at }}
        </small>
    </p>
</div> 

<div class="text-center mb-5">
    <a href="{{route('allServices')}}/{{$project->service->id}}" class="btn btn-lg btn-primary">Go to this service</a>
</div>

<script>
    document.querySelector('#home').className = "";
    document.querySelector('.menu-has-children').className = "menu-active";
</script>
@endsection