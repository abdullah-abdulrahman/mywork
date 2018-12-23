@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <div class="text-center bottom-btn">
            <a href="{{route('admin.projects.create')}}" class="btn btn-lg btn-primary">Add Project</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th></th>
            </tr>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>
                            {{$project->title}}
                        </td>
                        <td>
                            {!! Str::words($project->description, 10) !!}
                        </td>
                        <td>
                            <img src="{{url('/')}}{{$project->images[0]->image}}" width="100">  
                        </td>
                        <td>
                            <div class="text-center">
                                <a href="{{route('admin.projects.edit', ['id' => $project->id])}}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{route('admin.projects.destroy', ['id'=>$project->id])}}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger pl-3">delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
        <div class="text-center">
            {!! $projects->render() !!}
        </div> 
    </div>
</div>
@endsection