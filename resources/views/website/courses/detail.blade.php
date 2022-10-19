@extends('website.master')

@section('title')
    {{ $course->title }}
@endsection

@section('body')
    <section class="">

        {{--        Page Title Here--}}
        <div class="container-fluid py-5 bg-secondary">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white">Course Detail</h1>
                </div>
            </div>
        </div> {{--        Page Title Here--}}


        <div class="container py-5">
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card card-body h-100 shadow">
                        <img src="{{ asset($course->image) }}" alt="{{ $course->title }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body h-100 shadow">
                        <h3  class="text-center mt-5">{{ $course->title }}</h3>
                        <h6 class="mt-3">Trainer Name: {{ $course->teacher->name}}</h6>
                        @if($course->fee <10000)
                            <h4>Course Regular Fee: Tk. <del class="text-danger">{{ $course->fee }}</del></h4>
                            <h4>Course Offer Fee: Tk. {{ $course->fee }}</h4>

                        @else
                            <h4>Course Fee: TK. {{ $course->fee }}</h4>
                        @endif
                        <h6 class="mt-3">Starting Date: 01-10-2022</h6>
                        <h6 class="mt-3">Venu: BITM Kawran Bazar, Dhaka</h6>
                        <hr/>
                        <p>{!! $course->short_description !!}</p>
                        <a href="{{ route('enroll-now', ['id' => $course->id]) }}" class="btn btn-outline-success px-5 mt-5 {{ $status == true ? 'disabled' : '' }}">Enroll Now</a>
                        @if($status)
                            <p class="text-muted text-center mt-2">You are already enroll this course.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row mt-5">
            <div class="cal">
                <div class="card card-body">
                    <h4>Course details information.</h4>
                    <hr/>
                    <div>
                        {!! $course->long_description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

