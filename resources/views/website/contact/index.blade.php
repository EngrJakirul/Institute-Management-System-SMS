@extends('website.master')


@section('title')
    Our Contact Page
@endsection

@section('body')
    <section class="">
        {{--        Page Title Here--}}
        <div class="container-fluid py-5 bg-secondary">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white">Contact With Us</h1>
                </div>
            </div>
        </div> {{--        Page Title Here--}}
    </section>

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body h-100 shadow">
                        <div class="card-header">
                            <h4 class="text-center">send your message</h4>
                        </div>
                        <hr/>
                        <form action="" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-4" for="">Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" placeholder="enter your name" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4" for="">Email Address</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="email" placeholder="enter your email"/>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4" for="">Mobile Number</label>
                                <div class="col-md-8">
                                    <input type="tel" class="form-control" name="mobile" placeholder="enter your mobile number"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4" for="">Your Message</label>
                                <div class="col-md-8">
                                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4" for=""></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-outline-success px-5 bg-secondary text-white" value="send message"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body h-100 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Emergency Contact </h4>
                        </div>
                        <hr/>
                        <address>
                            House #420, Road #, 40, Adabor, Mohammadpur, Dhaka.<br/>
                            <b>Phone:</b> 0900800809, 9009898080 <br/>
                            <b>Email:</b> jakirul@gmail.com
                        </address>
                        <ul class="nav">
                            <li><a href="" class="nav-link "><i class="fa-brands fa-square-facebook"></i></a></li>
                            <li><a href="" class="nav-link "><i class="fa-brands fa-square-twitter"></i></a></li>
                            <li><a href="" class="nav-link "><i class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href="" class="nav-link "><i class="fa-brands fa-square-instagram"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="card card-body shadow">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7303.346525650873!2d90.39235148205442!3d23.759028203087205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bd552c2b3b%3A0x4e70f117856f0c22!2sBASIS%20Institute%20of%20Technology%20%26%20Management%20(BITM)!5e0!3m2!1sen!2sbd!4v1664365994790!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
