@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">
        <div class="text-center">
            <a href="{{route('admin.projects')}}" class="btn btn-lg btn-primary">Back</a>
        </div>

        @include('errors')
        
        <form method="POST" action="{{route('admin.projects.update', ['id'=> $id])}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
    
            <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" class="form-control" id="post-title" name="title" value="{{$project->title}}">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="6" id="article-ckeditor" name="description">{{$project->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Service type :</label>
                <select name="service_id" class="form-control">
                    @foreach ($services as $service)
                        @if($service->id == $project->service_id)
                            <option value="{{$service->id}}" selected>{{$service->name}}</option> 
                        @else
                            <option value="{{$service->id}}">{{$service->name}}</option>    
                        @endif   
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="image" accept="image/*">
                <p class="help-block">Image size should be 800*600</p>
            </div>

            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit edit</button>
            </p>
        </form>
    </div>
</div>
@endsection
