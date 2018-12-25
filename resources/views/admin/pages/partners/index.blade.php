@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <div class="text-center bottom-btn">
            <a href="{{route('admin.partners.create')}}" class="btn btn-lg btn-primary">Add item</a>
            <a href="{{route('homepage')}}/#partners" target="_blank" class="btn btn-lg btn-primary">Show on website</a>
        </div>
        @if(count($partners) > 0)
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Image</th>
                    <th></th>
                </tr>
                <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td>
                                    {{$partner->name}}
                            </td>
                            <td>
                                @if($partner->url !== null)
                                    {{$partner->url}}
                                @else 
                                    No URL available
                                @endif
                            </td>
                            <td>
                                <img src="{{url('/').IMAGES_PATH}}{{$partner->image}}" width="100">  
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="{{route('admin.partners.edit', ['id' => $partner->id])}}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{route('admin.partners.destroy', ['id'=>$partner->id])}}" style="display:inline">
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
            <div class="text-center">
                {!! $partners->render() !!}
            </div>
        @else
            <div class="text-center">
                <br><br><br>
                <h4>Your haven't added partners yet</h4>
            </div> 
        @endif
    </div>
</div>
@endsection