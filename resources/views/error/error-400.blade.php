@extends('frontend.layout.master')
@section('title', '404 Error')
@section('description', '404 Error')
@section('keywords', '404 Error')
@section('og-title', '404 Error')
@section('og-description', '404 Error')
<style>
.backbtn:hover svg{
  position: relative;
  left: -2px;
  transition: all 0.25s ease-in-out
}
</style>
@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    </section>
    <section class="pt-5 px-3 pb-5">
        <img src="{{ asset('front-assets/images/404-error.svg') }}" alt="Eroor 404" class="img-fluid mx-auto d-block"
            width="1100" height="440">
        <a href="{{ url('/') }}" class="d-block mx-auto mt-4 mt-md-5 backbtn" style="text-decoration: none; color:#027A48;width:fit-content;font-size:20px;font-weight:600">
            <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.292892 7.29289C-0.0976315 7.68342 -0.0976315 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM23 7L1 7V9L23 9V7Z"
                    fill="#027A48" />
            </svg>
            Back to Homepage</a>
    </section>

@endsection
@section('custom-script')

@endsection
