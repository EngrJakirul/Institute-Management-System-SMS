@extends('website.master')


@section('title')
    Our All Courses
@endsection


@section('body')


    <section class="py-3">
        <div class="container-fluid py-5 bg-dark">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white">Our All Courses Here</h1>
                    <h3 class="text-center text-warning">{{ Session::get('message') }}</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="container">
            <div class="row">
                @foreach($courses as $course)
                <div class="col-md-3 mb-3 mt-3">
                    <div class="card">
                        <img src="{{asset($course->image)}}" alt="" style="height: 300px; width: 254px;"  class="card-img-top"/>
                        <div class="card-body">
                            <h3>{{ $course->title }}</h3>
                            <h6>Venu: BITM</h6>
                            <p>TK: {{ $course->fee }}</p>
                            <p>Starting Date: 01.11.2022</p>
                            <hr/>
                            <a href="" class="btn btn-outline-success  px-5">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection







