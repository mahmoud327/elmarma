@extends('website.layouts.master')
@section('style')

<style>
    body {
        background: #f8f8f8;
    }

    .wrapper .section-title {
        padding-top: 80px;

    }

    .before-footer-div {
        background: url("website/img/how-bg.webp");
    }
</style>
@endsection
@section('content')

    <!-- ======= Courses Section ======= -->
    <section class="wrapper white-section">
        <div class="container">
            <div class="section-title">
                <p>Courses</p>
                <hr>
            </div>
            <div class="content">
                <div class="row">
                    @foreach ($courses as $course )
                        <div class="col-xs-12 col-md-3">
                            <div class="card" data-aos="zoom-in-up" >
                                <a class="img-card" href="#">
                                    <img src="{{asset($course->image)}}" alt="course-image">
                                </a>
                                <div class="card-content">
                                    <h5 class="card-title">
                                       {{  $course->title}}
                                    </h5>
                                    <ul>
                                        <li> {{ $course->des}} </li>
                                        {{-- <li>
                                            <i class="far fa-clock"></i>
                                                <span>{{ $course->start_date}}</span>
                                        </li> --}}
                                    </ul>

                                </div>
                                <div class="card-read-more">
                                    <a href="#">
                                        learn more
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ======= Courses Section ======= -->

@endsection
