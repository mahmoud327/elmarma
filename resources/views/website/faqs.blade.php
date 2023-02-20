@extends('website.layouts.master')
@section('style')

<style>
    body {
        background: #f1f1f1
    }
    .before-footer-div {
        background: url("website/img/Pattern-Background-2.png");
    }
</style>
@endsection
@section('content')

<div class="faqs">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <hr>
        <div class="accordion">

            <div class="row">
                @foreach ($questions as $question)
                    <div class="accordion-item col-md-6">
                        <button id="accordion-button-{{ $question->id }}" aria-expanded="false">
                            <span class="icon" aria-hidden="true"></span>
                        <span class="accordion-title">{{ $question->title }}</span>
                        </button>
                        <div class="accordion-content">
                        <p> {{ $question->answer }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
