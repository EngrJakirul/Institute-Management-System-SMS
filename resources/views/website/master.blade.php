<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMS - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/website/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/website/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/website/css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a href="" class="navbar-brand">SIMS</a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link">About</a></li>
            <li><a href="{{ route('courses') }}" class="nav-link">All Courses</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            @if(Session::get('student_id'))
                <li class="dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{Session::get('student_name')}}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('student.dashboard') }}" class="dropdown-item">Dashboard</a></li>
                        <li><a href="{{  route('student.logout') }}" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
            @else
            <li><a href="{{ route('login-registration') }}" class="nav-link">Login/Registration</a></li>
            @endif
        </ul>
    </div>

</nav>

@yield('body')

<footer>
    <section class="bg-secondary py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="text-uppercase fw-bold">SIMS</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias cupiditate debitis dolor doloribus esse eum harum, id illo iure laboriosam odit optio quas quibusdam repudiandae rerum sit velit veniam voluptas!</p>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body ">
                            <h4>Popular Link</h4>
                            <hr/>
                            <ul class="navb navbar-nav">
                                <li><a href="" class="nav-link">About us</a></li>
                                <li><a href="" class="nav-link">Our Courses</a></li>
                                <li><a href="" class="nav-link">Our Instructor</a></li>
                                <li><a href="" class="nav-link">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body ">
                            <h4>Contact With Us</h4>
                            <hr/>
                            <address>
                                House #241, Road #, 10, Dhanmondi, Dhaka.
                                <b>Phone:</b> 787987979, 8797899078098<br/>
                                <b>Email:</b>info$gmail.com
                            </address>

                            <ul class="nav">
                                <li><a href="" class="nav-link"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="" class="nav-link"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="" class="nav-link"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="" class="nav-link"><i class="fab fa-instagram-square"></i></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark pt-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-center text-white">copyright@jakri, Design & Development</p>
                </div>
            </div>
        </div>
    </section>
</footer>







<script src="{{ asset('/website/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('/website/js/jquery-3.6.0.min.js') }}"></script>
</body>
</html>
