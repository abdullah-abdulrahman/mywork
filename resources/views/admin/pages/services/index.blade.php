@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <div class="text-center bottom-btn">
            <a href="{{route('admin.services.create')}}" class="btn btn-lg btn-primary">Add Service</a>
            <a href="{{route('allServices')}}" target="_blank" class="btn btn-lg btn-primary">Show on website</a>
        </div>
        @if(count($services) > 0)
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Brief Description</th>
                    <th>Image</th>
                    <th></th>
                </tr>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>
                                {{$service->name}}
                            </td>
                            <td>
                                {!! Str::words($service->brief_description, 10) !!}
                            </td>
                            <td>
                                <img src="{{url('/').IMAGES_PATH}}{{$service->image}}" width="100">  
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="{{route('admin.services.edit', ['id' => $service->id])}}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{route('admin.services.destroy', ['id'=>$service->id])}}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger pl-3" onclick="return confirm('This action cannot be undone, Are you sure you want to delete?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        @else 
            <div class="text-center">
                <br><br><br>
                <h4>You haven't added services yet</h4>
            </div> 
        @endif
    </div>
</div>
@endsection