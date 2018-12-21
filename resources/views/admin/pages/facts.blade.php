@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div id="facts-form" class="container form-container">
        <form method="POST" action="{{route('admin.facts.update')}}">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <input type="number" class="form-control" id="post-title" name="num-one" value="{{$facts[0]->num_one}}">
                        <input type="text" class="form-control" maxlength="20" id="post-title" name="fact-one" value="{{$facts[0]->fact_one}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input type="number" class="form-control" id="post-title" name="num-two" value="{{$facts[0]->num_two}}">
                        <input type="text" class="form-control" maxlength="20" id="post-title" name="fact-two" value="{{$facts[0]->fact_two}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input type="number" class="form-control" id="post-title" name="num-three" value="{{$facts[0]->num_three}}">
                        <input type="text" class="form-control" maxlength="20" id="post-title" name="fact-three" value="{{$facts[0]->fact_three}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <input type="number" class="form-control" id="post-title" name="num-four" value="{{$facts[0]->num_four}}">
                        <input type="text" class="form-control" maxlength="20" id="post-title" name="fact-four" value="{{$facts[0]->fact_four}}">
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
    
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Submit Edit</button>
            </p>
        </form>
    </div>
</div>
@endsection