@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">
        <div class="text-center">
            <a href="{{route('admin.services')}}" class="btn btn-lg btn-primary">Back</a>
        </div>

        <form method="POST" action="{{route('admin.services.update', ['id'=> $id])}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
    
            <div class="form-group">
                <label for="post-title">Name</label>
                <input type="text" class="form-control" id="post-title" name="name" value="{{$service[0]->name}}">
            </div>

            <div class="form-group">
                <label>Brief Description</label>
                <textarea class="form-control" rows="1" name="brief-description">{{$service[0]->brief_description}}</textarea>
            </div>
    
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="6" id="article-ckeditor" name="description">{{$service[0]->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="image" accept="image/*">
                <p class="help-block">Image size should be 1920*1200</p>
            </div>
    
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit edit</button>
            </p>
        </form>
    </div>
</div>
@endsection
