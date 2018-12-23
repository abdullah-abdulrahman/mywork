@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">

        @include('errors')

        <form method="POST" action="{{route('admin.settings.update')}}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="post-title">Site name</label>
                <input type="text" class="form-control" id="post-title" name="site_name" value="{{$setting[0]->site_name}}">
            </div>

            <div class="form-group">
                <label for="post-title">Description</label>
                <input type="text" class="form-control" id="post-title" name="description" value="{{$setting[0]->description}}">
            </div>

            <div class="form-group">
                <label for="post-title">Email</label>
                <input type="text" class="form-control" id="post-title" name="email" value="{{$setting[0]->email}}">
            </div>

            <div class="form-group">
                <label for="post-title">Keywords</label>
                <input type="text" class="form-control" id="post-title" name="keywords" value="{{$setting[0]->keywords}}">
            </div>

            <div class="form-group">
                <label for="post-title">Facebook</label>
                <input type="text" class="form-control" id="post-title" name="facebook" value="{{$setting[0]->facebook}}">
            </div>

            <div class="form-group">
                <label for="post-title">LinkedIn</label>
                <input type="text" class="form-control" id="post-title" name="linkedin" value="{{$setting[0]->linkedin}}">
            </div>

            <div class="form-group">
                <label for="post-title">Instagram</label>
                <input type="text" class="form-control" id="post-title" name="instagram" value="{{$setting[0]->instagram}}">
            </div>

            <div class="form-group">
                <label>NewsLetter</label>
                <textarea class="form-control" id="summary-ckeditor" rows="6" name="newsletter">{{$setting[0]->newsletter}}</textarea>
            </div>

            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit Edit</button>
            </p>
        </form>
    </div>
</div>
@endsection