@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        @foreach ($about as $about_item)
            <div class="well">
                <div class="container well-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>
                                <b>title: </b>
                                {{$about_item->title}}
                            </p>
                            <p>
                                <b>description: </b>
                                {!! $about_item->description !!}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{url('/')}}{{$about_item->image}}" width="190">
                        </div>
                        <div class="col-lg-3">
                                <br>
                                <a href="{{route('admin.about.edit', ['id' => $about_item->id])}}" class="btn btn-primary">edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection