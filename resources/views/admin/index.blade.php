@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="container view-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="well text-center">
                            <h1>Services</h1>
                            <h3>{{$services}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="well text-center">
                            <h1>Projects</h1>
                            <h3>{{$projects}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="well text-center">
                            <h1>Partners</h1>
                            <h3>{{$partners}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="well text-center">
                            <h1>MailingList</h1>
                            <h3>{{$mailinglist}}</h3>
                        </div>
                    </div>
                        
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{url('/')}}/admin_assets/dist/img/index.png" width="500px">
            </div>
        </div>
    </div>
</div>
@endsection