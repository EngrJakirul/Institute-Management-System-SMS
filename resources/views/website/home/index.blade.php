@extends('website.master')

@section('title')
    Simple Institute Management System
@endsection

@section('body')
    <div id="slider" class="carousel slider" data-bs-ride="carousel" data-bs-interval="1800">
        <ol class="carousel-indicators">
            @foreach($offerCourses as $key => $offerCourse)
            <li data-bs-target="#slider" data-bs-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
           @foreach($offerCourses as $key1 => $offerCourse)
                <div class="carousel-item {{ $key1 == 0 ? 'active' : '' }}">
                    <img src="{{ asset($offerCourse->image) }}" alt="" class="w-100" style= "height: 594px" >
                    <div class="carousel-caption">
                        <h1 class="text-black">{{ $offerCourse->title }}</h1>
                        <p class="text-warning">Actual Course Fee: {{ $offerCourse->fee }}</p>
                        <p class="text-warning">Offer Fee: {{ $offerCourse->fee }}</p>
                        <a href="{{ route('courses-detail', ['id' => $offerCourse->id]) }}" class="btn btn-warning btn-outline-success px-5">Read More</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <section class="">
        <div class="container-fluid bg-dark py-3">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white">Our Popular Courses</h1>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                @foreach($courses as $course)
                <div class="col-lg-3 mb-3">
                    <div class="card h-100">
                        <img src="{{asset($course->image)}}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5><a href="{{ route('courses-detail', ['id' => $course->id]) }}" class="text-decoration-none text-muted">{{ $course->title }}</a></h5>
{{--                            <h6>{{ $course->teacher }}</h6>--}}
                            <p>TK.{{ $course->fee }}</p>
{{--                            <p>Starting Date:{{$course->starting_date}}</p>--}}
                            <hr/>
                            <a href="{{ route('courses-detail', ['id' => $course->id]) }}" class="btn btn-success text-center px-5">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>



    <section>
        <div class="container-fluid bg-dark py-5">
            <div class="row">
                <div class="col">
                    <h2 class="text-white text-center">Recent Course</h2>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-3 mb-5">
                        <div class="card">
                            <img src="{{ asset($course->image) }}" alt="" class="card-img-top">
                        </div>
                        <div class="card-body py-3">
                            <h5>{{ $course->title }}</h5>
                            <h4></h4>
                            <p>Tk. {{ $course->fee }}</p>
                            <p>Starting Date: {{ $course->starting_date }}</p>
                            <hr/>
                            <a href="{{ route('courses-detail', ['id' => $course->id]) }}" class="btn btn-success px-4">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
