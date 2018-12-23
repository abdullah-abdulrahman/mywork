@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <table class="table table-bordered">
        <tr>
            <th>From:</th>
            <th>Email:</th>
            <th>At:</th>
            <th>Subject:</th>
            <th></th>
        </tr>
        <tbody>
            @foreach ($inbox as $inbox_item)
                <tr>
                    <td>{{$inbox_item->name}}</td>
                    <td>{{$inbox_item->email}}</td>
                    <td>{{$inbox_item->created_at}}</td>
                    <td>{{$inbox_item->subject}}</td>
                    <td>
                        <div class="text-center">
                            <a href="{{route('admin.inbox.show', ['id' => $inbox_item->id])}}" class="btn btn-primary">Show</a>
                            <form method="POST" action="{{route('admin.inbox.destroy', ['id'=>$inbox_item->id])}}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger pl-3">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>   
    <div class="text-center">
        {{ $inbox->render() }}    
    </div>    
</div>
@endsection