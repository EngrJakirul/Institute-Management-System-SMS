@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Course offer form</h4>
                    <h6 class="text-center text-success">{{Session::get('message')}}</h6>
                    <form action="{{ route('admin.update-course-offer') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Course Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="course_id" id="">
                                    <option value="" disabled selected>-- Select Your Course --</option>

                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{$course->id == $single_course->id ? 'selected' : ''}}> {{ $course->title }} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Banner Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" id="horizontal-email-input">
                                <img src="{{ asset($single_course->image) }}" alt="" height="100"  width="100"/>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Offer Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="fee" value="{{ $single_course->fee}}" class="form-control" id="horizontal-password-input">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Course Offer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end row -->



@endsection
