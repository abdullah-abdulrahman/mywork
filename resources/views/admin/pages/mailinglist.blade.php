@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <table class="table table-bordered">
            <tr>
                <th>Email:</th>
                <th>Added at:</th>
                <th></th>
            </tr>
            <tbody>
                @foreach ($mailinglist as $mailinglist_item)
                    <tr>
                        <td>{{$mailinglist_item->email}}</td>
                        <td>{{$mailinglist_item->created_at}}</td>
                        <td>
                            <form method="POST" action="{{route('admin.mailinglist.destroy', ['id'=>$mailinglist_item->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger pl-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    </div>
</div>
@endsection