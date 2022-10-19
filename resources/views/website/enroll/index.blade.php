@extends('website.master')

@section('title')
    Enroll Page
@endsection

@section('body')
    <section class="">

        {{--        Page Title Here--}}
        <div class="container-fluid py-5 bg-secondary">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white">Enroll Now of {{ $course->title }}</h1>
                </div>
            </div>
        </div> {{--        Page Title Here--}}


        <div class="container py-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card card-body h-100 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Enroll Form</h4>
                        </div>
                        <hr/>
                        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                        <form action="{{ route('enroll.newStudent', ['id' => $course->id]) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-3" for="">Full Name</label>
                                <div class="col-md-9">
                                    @if(isset($student->name))
                                        <input type="text" class="form-control" value="{{$student->name}}" name="name" readonly />
                                    @else
                                        <input type="text" class="form-control" name="name">
                                    @endif
                                    <span>{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3" for="">Email Address</label>
                                <div class="col-md-9">
                                    @if(isset($student->email))
                                    <input type="email" class="form-control" value="{{$student->email}}" name="email" readonly/>
                                    @else
                                        <input type="email" class="form-control" name="email">
                                    @endif
                                    <span>{{$errors->has('email') ? $errors->first('email') : ''}}</span>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3" for="">Mobile Number</label>
                                <div class="col-md-9">
                                    @if(isset($student->mobile))
                                        <input type="tel" class="form-control" value="{{$student->mobile}}" name="mobile" readonly/>
                                    @else
                                        <input type="tel" class="form-control" name="mobile">
                                    @endif
                                        <span>{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3" for="">Payment option</label>
                                <div class="col-md-9">
                                    <label><input type="radio"  name="payment_type" checked value="cash"/>Cash</label>
                                    <label><input type="radio"  name="payment_type" value="online"/>Online</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3" for=""></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-outline-success px-5 bg-secondary text-white" value="Enroll Now"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
