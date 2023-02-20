<!-- ======= Footer ======= -->

<section class="white-section contact-section before-footer-div">
    <div class="footer-absolute-img">
        <img src="https://ik.imagekit.io/quranmasteronline/assets/images/footer-top.png?updatedAt=1631282447592"
            alt="">
    </div>
</section>

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>Makkah Quran Academy</h3>
                        <p> {{$setting->address ?? ' '  }} </p>
                        <a href="https://wa.me/+201019500346?text=Hi *Makkah Quran Academy*! I need more info about you"
                            target="_blank"><strong>Phone:</strong> {{ $setting->phone ?? ' ' }}</a><br>
                        <a href="mailto:info@example.com"><strong>Email:</strong>  {{ $setting->email ?? ' ' }}</a><br>

                        <div class="social-links mt-3">
                            <a href="{{$setting->tw_link ?? ' ' }}" class="twitter"><i class="bx bxl-twitter" target="_blank"></i></a>
                            <a href="{{ $setting->fb_link  ?? ' ' }}" target="_blank"
                                class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="{{$setting->inst_link  ?? ' '  }}" target="_blank"
                                class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="{{$setting->skype_link  ?? ' '  }}" class="google-plus"><i class="bx bxl-skype" target="_blank"></i></a>
                            <a href="{{$setting->linkedin_link  ?? ' '  }}" class="linkedin"><i class="bx bxl-linkedin" target="_blank"></i></a>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <img src="{{ asset('website/img/footer/paypal.jpg') }}" alt="" width="50"
                                height="20">
                            <img src="{{ asset('website/img/footer/visa.png') }}" alt="" width="50" height="20">
                            <img src="{{ asset('website/img/footer/master_card.png') }}" alt="" width="50"
                                height="20">
                            <img src="{{ asset('website/img/footer/wu2.jpg') }}" alt="" width="50" height="20">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Why Us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">courses</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Fees</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">FAQs</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Tajued</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Arabic</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Quran</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>MQA</span></strong>. All Rights Reserved
        </div>

    </div>
</footer><!-- End Footer -->
