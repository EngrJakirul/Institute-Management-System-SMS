@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add Course offer form</h4>
                    <h6 class="text-center text-success">{{Session::get('message')}}</h6>
                    <form action="{{ route('admin.create-course-offer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Course Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="course_id" id="">
                                    <option value="" disabled selected>-- Select Your Course --</option>

                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}"> {{ $course->title }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Banner Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" id="horizontal-email-input">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Offer Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="fee" class="form-control" id="horizontal-password-input">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Create New Course Offer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end row -->

    <div class="row" >
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Course Offer Info</h4>
                    <p class="card-title-desc">{{ Session::get('message') }}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Course Title</th>
                            <th>Starting Date</th>
                            <th>Course Fee</th>
                            <th>Offer Fee</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($offer_courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->title  }}</td>
                                <td>{{ $course->starting_date }}</td>
                                <td>{{ $course->fee }}</td>
                                <td>{{ $course->fee}}</td>
                                <td>
                                    <a href="{{ route('admin.edit-course-offer', ['id' => $course->id]) }}" class="btn btn-warning btn-sm" title="View Course Detail"><i class="fa fa-book-edit">Edit Course</i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
