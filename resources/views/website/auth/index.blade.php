@extends('website.master')

@section('title')
    Login Registration
@endsection

@section('body')
    <section class="">

        {{--        Page Title Here--}}
        <div class="container-fluid py-5 bg-secondary">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white">Login Or Registration</h1>
                </div>
            </div>
        </div> {{--        Page Title Here--}}


        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body h-100 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Login Form</h4>
                        </div>
                        <hr/>
                        <h4 class="text-center text-danger">{{ Session::get('message') }}</h4>
                        <form action="{{ route('student.login') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-3" for="">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" placeholder="enter your email"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3" for="">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" placeholder="enter your password"/>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <label class="col-md-3" for=""></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-outline-success px-5 bg-secondary text-white" value="Login"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body h-100 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Registration Form</h4>
                        </div>
                        <hr/>
                        <form action="" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-3" for="">Full Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="enter your name" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3" for="">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" placeholder="enter your email"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3" for="">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" placeholder="enter your password"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3" for="">Mobile Number</label>
                                <div class="col-md-9">
                                    <input type="tel" class="form-control" name="mobile" placeholder="enter your mobile number"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3" for=""></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-outline-success px-5 bg-secondary text-white" value="Registration"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
