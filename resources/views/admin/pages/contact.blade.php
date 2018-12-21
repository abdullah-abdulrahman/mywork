@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container form-container">
        <form method="POST" action="{{route('admin.contact.update')}}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="post-title">Description</label>
                <input type="text" class="form-control" id="post-title" name="description" value="{{$contact[0]->description}}">
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" rows="6" name="address">{{$contact[0]->address}}</textarea>
            </div>

            <div class="form-group">
                <label for="post-title">Phone</label>
                <input type="text" class="form-control" id="post-title" name="phone" value="{{$contact[0]->phone}}">
            </div>

            <div class="form-group">
                <label for="post-title">Email</label>
                <input type="text" class="form-control" id="post-title" name="email" value="{{$contact[0]->email}}">
            </div>


            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit Edit</button>
            </p>
        </form>
    </div>
</div>
@endsection