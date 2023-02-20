<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
        <h1 class="logo me-auto me-lg-0"><a href="{{ route('website.home.index') }}"> <img
                    src="{{ asset('website/img/logo/logo.png') }}" alt=""> </a></h1>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto {{ isActive(request()->getHttpHost()) }}" href="{{ route('website.home.index') }}">Home</a></li>
                <li><a class="nav-link scrollto {{ isActive('why-us') }}" href="{{ route('website.why-us') }}">Why Us</a></li>
                <li><a class="nav-link scrollto {{ isActive('course') }}" href="{{ route('website.courses') }}">Courses</a></li>
                <li><a class="nav-link scrollto {{ isActive('fees') }}" href="{{ route('website.fees') }} ">Fees </a></li>
                <li><a class="nav-link scrollto {{ isActive('faqs') }}" href="{{ route('website.faqs') }}">FAQs </a></li>
                <li><a class="nav-link scrollto {{ isActive('contact-us') }}" href="{{ route('website.contact-us') }}">Contact Us</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
