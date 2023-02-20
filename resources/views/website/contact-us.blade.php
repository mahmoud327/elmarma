@extends('website.layouts.master')
@section('style')

<style>
    body {
        /* background: #f1f1f1 */
    }
    .content {
        padding-top: 50px
    }
    .content hr{
        width: 70px;
        height: 3px;
        margin: 20px auto;
        color: #FFF;
        margin-bottom: 50px;
    }

    .contact-us .form-group .form-input, .contact-us .form-group select.form-input {
        margin: 20px 35px;
        width: 555px;
        height: 50px;
        background: transparent;
        border: 1px solid #FFF;
        border-radius: 99px;
        outline: none;
        color: #FFF;
        padding: 0 8px;
    }

    .contact-us .form-group .submit-btn {
        color: #FFF;
        width: 250px;
        height: 35px;
        background: #ffb100;
        border: 1px solid #FFF;
        border-radius: 88px;
        font-weight: 800;
        margin: auto 0
    }

    .before-footer-div {
        background: url("website/img/Pattern-Background-2.png");
    }
</style>
@endsection
@section('content')

<section class="contact-us">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="content text-center">
                    <h3>Contact Us</h3>
                    <hr>
                </div>


                <form id="contact-us" class="row" action="{{ route('website.contact_us.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-md-6">
                            <input class="form-input" type="text" name="name" placeholder="Your Name" required>
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-input" type="email" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-input" type="text" name="phone" placeholder="Phone With Country Code" required>
                        </div>

                        <div class="form-group col-md-6">
                            <select class="form-input" name="nationality_id" id="nationality" required>
                                <option value="">Nationality</option>
                                @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12 text-center">
                            <input class="submit-btn" type="submit" value="Contact Us">
                        </div>
                </form>
        </div>
    </div>
    </div>
</section>

@endsection
