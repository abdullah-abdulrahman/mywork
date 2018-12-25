@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        @if(count($mailinglist) > 0)
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
                                <div class="text-center">
                                    <form method="POST" action="{{route('admin.mailinglist.destroy', ['id'=>$mailinglist_item->id])}}">
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
                <h4>Your mailinglist is empty</h4>
            </div> 
        @endif
    </div>
</div>
@endsection