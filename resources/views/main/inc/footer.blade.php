<footer id="footer">
    <div class="footer-top">
        <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 footer-info">
            <img src="{{url('/')}}/main_assets/img/logo.png" height="70px" alt="" title="" />
            <p>
                We can place your
                message in front of millions of
                shoppers at malls and lifestyle centers
                across the country. From local, to regional, to
                national advertisers, we provide access to target
                a captive audience. Below are examples of some of
                the many campaigns we›ve run at our centers across the
                country.
            </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul >
                <li><i class="ion-ios-arrow-right"></i> <a href="{{url('/')}}">Home</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="{{url('/')}}#about">About us</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="{{url('/')}}#team">Team</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="{{url('/')}}#portfolio">Portfolio</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="{{url('/')}}#clients">Partners</a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="{{url('/')}}#contact">Contact us</a></li>
            </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
                <strong>Address:</strong>
                {{ $contact[0]->address }} <br>
                <strong>Phone:</strong> {{ $contact[0]->phone }}<br>
                <strong>Email:</strong> {{ $contact[0]->email }}<br>
            </p>

            <div class="social-links">
                <a href="{{ $setting[0]->facebook }}" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="{{ $setting[0]->instagram }}" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="{{ $setting[0]->linkedin }}" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                {{-- <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a> --}}
                {{-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> --}}
            </div>

            </div>

            <div class="col-lg-3 col-md-6 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>{{ $setting[0]->newsletter }}</p>
                <form action="{{route('subscribe')}}" method="post">
                    @csrf
                    <input type="email" name="email"><input type="submit"  value="Subscribe">
                </form>
            </div>

        </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
        &copy; Copyright <strong>SmartTech</strong>. All Rights Reserved
        </div>
        <div class="credits">
    </div>
</footer>