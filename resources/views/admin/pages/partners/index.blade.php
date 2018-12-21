@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
            <div class="text-center bottom-btn">
                <a href="{{route('admin.partners.create')}}" class="btn btn-lg btn-primary">Add New Partner</a>
            </div>

        @foreach ($partner as $partner_item)
            <div class="well">
                <div class="container well-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>
                                <b>Name: </b>
                                {{$partner_item->name}}
                            </p>
                            <p>
                                <b>URL: </b>
                                @if($partner_item->url !== null)
                                    {{$partner_item->url}}
                                @else 
                                    No URL available
                                @endif
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{url('/')}}{{$partner_item->image}}" width="190">
                        </div>
                        <div class="col-lg-3">
                                <br>
                                <a href="{{route('admin.partners.edit', ['id' => $partner_item->id])}}" class="btn btn-primary">edit</a>
                                <form method="POST" action="{{route('admin.partners.destroy', ['id'=>$partner_item->id])}}" style="display:inline">
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