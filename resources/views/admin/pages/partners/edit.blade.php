@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">
        <form method="POST" action="{{route('admin.partners.update', ['id'=> $id])}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
    
            <div class="form-group">
                <label for="post-title">Name</label>
                <input type="text" class="form-control" id="post-title" name="name" value="{{$partner[0]->name}}">
            </div>

            <div class="form-group">
                <label>URL</label>
                <textarea class="form-control" rows="1" name="url">{{$partner[0]->url}}</textarea>
            </div>

            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="image" accept="image/*">
                <p class="help-block">Image size should be 300*200</p>
            </div>
    
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit edit</button>
            </p>
        </form>
    </div>
</div>
@endsection
