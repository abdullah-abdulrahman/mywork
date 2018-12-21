@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        @foreach ($service as $service_item)
            <div class="well">
                <div class="container well-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>
                                <b>Name: </b>
                                {{$service_item->name}}
                            </p>
                            <p>
                                <b>Brief Description: </b>
                                {{$service_item->brief_description}}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{url('/')}}{{$service_item->image}}" width="190">
                        </div>
                        <div class="col-lg-3">
                                <br>
                                <a href="{{route('admin.services.edit', ['id' => $service_item->id])}}" class="btn btn-primary">edit</a>
                                <form method="POST" action="{{route('admin.services.destroy', ['id'=>$service_item->id])}}" style="display:inline">
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

    <div class="text-center bottom-btn">
        <a href="{{route('admin.services.create')}}" class="btn btn-lg btn-primary">Add New Service</a>
    </div>

</div>
@endsection