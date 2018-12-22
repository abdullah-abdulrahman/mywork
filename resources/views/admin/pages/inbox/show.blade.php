@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <h2 class="text-center"><b>{{$inbox->subject}}</b></h2>
        <h5 class="text-center"><b>From: </b>{{$inbox->email}}</h5>
        <h5 class="text-center"><b>At: </b>{{$inbox->created_at}}</h5>

        <p class="text-center bordered">
            {{$inbox->message}}
        </p>

        <div class="text-center">
            <form method="POST" action="{{route('admin.inbox.destroy', ['id'=>$inbox->id])}}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
            </form>
            <a href="{{route('admin.inbox')}}" class="btn btn-primary btn-lg">Back to Inbox</a>
        </div>
    </div>
</div>
@endsection