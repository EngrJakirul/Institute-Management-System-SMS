@extends('teacher.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Course form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{ route('course.update', ['id' => $course->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Course Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" value="{{ $course->title }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Course Fee</label>
                            <div class="col-sm-9">
                                <input type="text" name="fee" value="{{ $course->fee }}" class="form-control" id="horizontal-firstname-input ">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Starting Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="starting_date" value="{{ $course->starting_date }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Ending Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="ending_date" value="{{ $course->ending_date }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Course Duration</label>
                            <div class="col-sm-9">
                                <input type="text" name="course_duration" value="{{ $course->course_duration }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>



                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description" class="form-control summernote" cols="30" rows="10">{{ $course->short_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" id="short_description" class="form-control summernote" cols="30" rows="10">{{ $course->logn_description }}</textarea>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Course Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                                <img src="{{ asset($course->image) }}" alt="" height="200" width="300"/>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Course Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

