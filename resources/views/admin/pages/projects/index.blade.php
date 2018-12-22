@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <div class="text-center bottom-btn">
            <a href="{{route('admin.projects.create')}}" class="btn btn-lg btn-primary">Add New Project</a>
        </div>
            
        @foreach ($projects as $project)
            <div class="well">
                <div class="container well-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>
                                <b>Title: </b>
                                {{$project->title}}
                            </p>
                            <p>
                                <b>Description: </b>
                                {!! $project->description !!}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{url('/')}}{{$project->images[0]->image}}" width="190">
                        </div>
                        <div class="col-lg-3">
                                <br>
                                <a href="{{route('admin.projects.edit', ['id' => $project->id])}}" class="btn btn-primary">edit</a>
                                <form method="POST" action="{{route('admin.projects.destroy', ['id'=>$project->id])}}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger pl-3">delete</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {!! $projects->render() !!}
        </div>
    </div>
</div>
@endsection