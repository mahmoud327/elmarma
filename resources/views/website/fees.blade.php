@extends('website.layouts.master')
@section('style')

<style>
    body {
        background: #f1f1f1;
    }

    .pricing-sec .pricing-area-head {
        padding-top: 80px;

    }

    .before-footer-div {
        background: #f8f8f8;
    }
</style>
@endsection
@section('content')

    <!--Start Fees -->

    <div class="white-section pricing-sec pricingsec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content">
                        <div id="tajweed-model" class="tab-pane active">
                            <div class="row">
                                <div class="col-12">
                                    <div class="pricing-area-head text-center">
                                        <h3>Our Economical Pricing</h3>
                                        <p>Quran Online Master provides the intuitive tuition for the Alphabet Sound
                                            Recognition for all
                                            people who intend to learn the Holy Quran in a proper religious way.</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="tab-content pricing-tabs-content">
                                        <div id="alphabets-recognation" class="tab-pane active">
                                            <!--<div class="row"> <div class="col-12"> <div class="pricing-area-head text-center"> <h3>Alphabets Sound Recognition</h3> <p>Quran Online Master provides the intuitive tuition for the Alphabet Sound Recognition for all people who intend to learn the Holy Quran in a proper religious way.</p> </div> </div> </div>-->
                                            <div class="row pricing-row">
                                                <div class="col-lg-3 col-md-6" data-aos="fade-right"
                                                                                data-aos-offset="100"
                                                                                data-aos-easing="ease-in-sine">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="{{ asset('website/img/price/icons-01.png') }}"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>2 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>30<sub>/mo</sub>
                                                                    <p>For Weekends $35/mo</p>
                                                                </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>8 Classes/Month</li>
                                                                    <li>4 hours/Month</li>
                                                                </ul> <a href="{{ route('website.contact-us') }}">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6" data-aos="flip-right"
                                                                                data-aos-offset="200"
                                                                                data-aos-easing="ease-in-sine">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="{{ asset('website/img/price/icons-02.png') }}"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>3 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>45<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>12 Classes/Month</li>
                                                                    <li>6 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6" data-aos="flip-left"
                                                                                data-aos-offset="300"
                                                                                data-aos-easing="ease-in-sine">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="{{ asset('website/img/price/icons-3.png') }}"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>4 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>60<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>16 Classes/Month</li>
                                                                    <li>8 hours/Month</li>
                                                                </ul> <a href="{{ route('website.contact-us') }}">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6" data-aos="fade-left"
                                                                                data-aos-offset="100"
                                                                                data-aos-easing="ease-in-sine">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="{{ asset('website/img/price/icons-4.png') }} "
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>5 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>75<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>20 Classes/Month</li>
                                                                    <li>10 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="alphabets-pronounciation" class="tab-pane fade">
                                            <!--<div class="row"> <div class="col-12"> <div class="pricing-area-head text-center"> <h3>Alphabets Pronounciation</h3> <p>Quran Online Master teaches the perfect Quranic Alphabet Pronunciation for all people ranging from children to elders of any age. Learning the Quran has no age limits, and that’s our motto.</p> </div> </div> </div>-->
                                            <div class="row pricing-row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-06.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>2 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>30<sub>/mo</sub>
                                                                    <p>For Weekends $35/mo</p>
                                                                </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>8 Classes/Month</li>
                                                                    <li>4 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-07.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>3 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>45<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>12 Classes/Month</li>
                                                                    <li>6 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-08.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>4 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>60<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>16 Classes/Month</li>
                                                                    <li>8 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-09.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>5 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>75<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>20 Classes/Month</li>
                                                                    <li>10 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tajawed-rules" class="tab-pane fade">
                                            <!--<div class="row"> <div class="col-12"> <div class="pricing-area-head text-center"> <h3>Tajawed Rules</h3> <p>We offer the tajweed rules under the three dynamic stages such as AT-TAHQEEQ, AL-HADR, AT-TADWEER. Have a Quran Master Online for your perfect assistance in learning or reading the Quran.</p> </div> </div> </div>-->
                                            <div class="row pricing-row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-06.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>2 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>30<sub>/mo</sub>
                                                                    <p>For Weekends $35/mo</p>
                                                                </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>8 Classes/Month</li>
                                                                    <li>4 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-07.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>3 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>45<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>12 Classes/Month</li>
                                                                    <li>6 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-08.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>4 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>60<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>16 Classes/Month</li>
                                                                    <li>8 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="single-pricing">
                                                        <div class="single-pricing-head"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                                data-name="Layer 1" viewBox="0 0 394 262">
                                                                <path class="pricing-ornament-path"
                                                                    d="M0,262H394v-4.8s2.1-66.4-67.6-89.3a3.79,3.79,0,0,1-2.6-3.8c.8-10.5,1-47.1-28.7-69.6-.1-.1-.2-.1-.3-.2-3.4-2.2-64.3-40.7-90-83.4-.1-.1-.1-.2-.2-.3L200.3,2a3.7,3.7,0,0,0-6.6,0l-4.3,8.6c-.1.1-.1.2-.2.3-25.7,42.7-86.6,81.2-90,83.4-.1.1-.2.1-.3.2C69.1,117,69.4,153.6,70.2,164.1a3.67,3.67,0,0,1-2.6,3.8C-2.1,190.8,0,257.2,0,257.2V262Z">
                                                                </path>
                                                            </svg> <img
                                                                src="https://ik.imagekit.io/quranmasteronline/assets/images/third-sec/icons-09.png"
                                                                alt=""> </div>
                                                        <div class="single-pricing-body">
                                                            <h5>5 Days/Week</h5>
                                                            <div class="single-inner-pricing">
                                                                <h3> <sup>$</sup>75<sub>/mo</sub> </h3>
                                                                <ul>
                                                                    <li>30 min lessons</li>
                                                                    <li>20 Classes/Month</li>
                                                                    <li>10 hours/Month</li>
                                                                </ul> <a href="javascript:void(0)">Contact Us</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">

                </div>
            </div>
        </div>
    </div>

    <!-- End Fees Section -->

@endsection
