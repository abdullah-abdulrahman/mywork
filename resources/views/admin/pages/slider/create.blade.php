@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">
        <form method="POST" action="{{route('admin.slider.store')}}" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" class="form-control" id="post-title" name="title">
            </div>
    
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="6" name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="image" accept="image/*">
                <p class="help-block">Image size should be 1920*1200</p>
            </div>
    
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit item</button>
            </p>
        </form>
    </div>
</div>
@endsection
