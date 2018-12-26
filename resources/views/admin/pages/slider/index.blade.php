@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <div class="text-center bottom-btn">
            <a href="{{route('admin.slider.create')}}" class="btn btn-lg btn-primary">Add item</a>
            <a href="{{route('homepage')}}" target="_blank" class="btn btn-lg btn-primary">Show on website</a>
        </div>
            
        @foreach ($sliders as $slider)
            <div class="well">
                <div class="container well-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>
                                <b>title: </b>
                                {{$slider->title}}
                            </p>
                            <p>
                                <b>description: </b>
                                {{$slider->description}}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{get_slider_image($slider->image)}}" width="190">
                        </div>
                        <div class="col-lg-3">
                                <br>
                                <a href="{{route('admin.slider.edit', ['id' => $slider->id])}}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{route('admin.slider.destroy', ['id'=>$slider->id])}}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger pl-3" onclick="return confirm('This action cannot be undone, Are you sure you want to delete?')">
                                        Delete
                                    </button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection