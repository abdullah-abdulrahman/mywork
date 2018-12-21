@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">
        <form method="POST" action="{{route('admin.team.update')}}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" class="form-control" id="post-title" name="title" value="{{$team[0]->title}}">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="summary-ckeditor" rows="6" name="description">{{$team[0]->description}}</textarea>
            </div>

            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit Edit</button>
            </p>
        </form>
    </div>
</div>
@endsection