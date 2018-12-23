<style>
    #header {
    background-color: #904E65;
    }
</style>

<header id="header">
    <div class="container-fluid">

        <div id="logo" class="pull-left">
            <a href="{{url('/')}}/#intro"><img src="{{url('/')}}/main_assets/img/logo.png" height="50px" alt="" title="" /></a>
        </div>

        <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li id="home" class="menu-active"><a href="{{url('/')}}/#intro">Home</a></li>
            <li><a href="{{url('/')}}/#about">About Us</a></li>
            <li><a href="{{url('/')}}/#team">Team</a></li>
            <li><a href="{{url('/')}}/#team">Facts</a></li>
            <li><a href="{{url('/')}}/#portfolio">Portfolio</a></li>
            <li><a href="{{url('/')}}/#clients">Partners</a></li>
            <li class="menu-has-children"><a href="{{url('/')}}/services">Services</a>
            <ul>
                <li><a href="{{route('allServices')}}">All</a></li>
                <hr>
                @foreach ($services as $service)
                    <li><a href="{{route('service', ['id' => $service->id])}}">{{$service->name}}</a></li>   
                @endforeach
            </ul>
            </li>
            <li id="gallery"><a href="{{route('gallery')}}">Gallery</a></li>
            <li><a href="{{url('/')}}/#contact">Contact us</a></li>
        </ul>
        </nav>
    </div>
</header>