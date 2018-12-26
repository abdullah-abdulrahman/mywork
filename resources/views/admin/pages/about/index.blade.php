@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <div class="text-center bottom-btn">
            <a href="{{route('homepage')}}/#about" target="_blank" class="btn btn-lg btn-primary">Show on website</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th></th>
            </tr>
            <tbody>
                @foreach ($abouts as $about)
                    <tr>
                        <td>
                            {{$about->title}}
                        </td>
                        <td>
                            {!! Str::words($about->description, 10) !!}
                        </td>
                        <td>
                            <img src="{{get_about_image($about->image)}}" width="100">  
                        </td>
                        <td>
                            <div class="text-center">
                                <a href="{{route('admin.about.edit', ['id' => $about->id])}}" class="btn btn-primary">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    </div>
</div>
@endsection