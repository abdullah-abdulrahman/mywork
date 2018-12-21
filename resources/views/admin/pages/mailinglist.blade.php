@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        @foreach ($mailinglist as $mailinglist_item)
        <div class="well">
            <div class="container well-container">
                <div class="row">
                    <div class="col-lg-4">
                        {{$mailinglist_item->email}}
                    </div>
                    <div class="col-lg-6">
                        <b>Added at: </b>{{$mailinglist_item->created_at}}
                    </div>
                    <div class="col-lg-2">
                        <form method="POST" action="{{route('admin.mailinglist.destroy', ['id'=>$mailinglist_item->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger pl-3">delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection