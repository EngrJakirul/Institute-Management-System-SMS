@extends('admin.master')

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
                            <th>Teacher Info</th>
                            <th>Starting Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr class="{{ $course->status == 1 ? 'bg-success' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->title  }}</td>
                                <td>{{ $course->teacher->name.'-'.'Mobile Number '.$course->teacher->mobile}}</td>
                                <td>{{ $course->starting_date }}</td>
                                <td>{{ $course->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{ route('admin.course-detail', ['id' => $course->id]) }}" class="btn btn-success btn-sm" title="View Course Detail"><i class="fa fa-book-open">detail</i></a>
                                    <a href="{{ route('admin.update-course-status', ['id' => $course->id]) }}" class="btn {{ $course->status == 0 ? 'btn-warning' : 'btn-success' }} btn-sm" title="Update Course Status"><i class="fa fa-arrow-up"></i></a>
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

