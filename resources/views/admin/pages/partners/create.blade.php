@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">
        
        @include('errors')
        
        <form method="POST" action="{{route('admin.partners.store')}}" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="post-title">Name</label>
                <input type="text" class="form-control" id="post-title" name="name" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="post-title">URL</label>
                <input type="text" class="form-control" id="post-title" name="name" value="{{old('url')}}">
            </div>

            <div class="form-group">
                <label>Add Image</label>
                <input type="file" name="image" accept="image/*">
                <p class="help-block">Image size should be 300*200</p>
            </div>
    
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit item</button>
            </p>
        </form>
    </div>
</div>
@endsection
