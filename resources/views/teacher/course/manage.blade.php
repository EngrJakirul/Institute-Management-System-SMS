@extends('teacher.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Course Info</h4>
                    <p class="card-title-desc">{{ Session::get('message') }}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Course Title</th>
                            <th>Start Date</th>
{{--                            <th>Image</th>--}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->title}}</td>
                                <td>{{ $course->starting_date}}</td>
{{--                                <td><img src="{{ asset($course->image) }}" alt="" height="100" width="100"></td>--}}
                                <td>{{ $course->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{ route('course.detail', ['id' => $course->id]) }}" class="btn btn-primary btn-sm "><i class="fa fa-book-open"></i></a>
                                    <a href="{{ route('course.edit',   ['id' => $course->id]) }}" class="btn btn-success btn-sm "><i class="fa fa-edit" onclick="return confirm('Are you sure to edit this....?')"></i></a>
                                    <a href="{{ route('course.delete', ['id' => $course->id]) }}" class="btn btn-danger btn-sm " ><i class="fa fa-trash " onclick="return confirm('Are you sure to delete this.....?')"></i></a>
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

