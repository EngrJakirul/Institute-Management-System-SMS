@extends('admin.master')

@section('title')
    Enroll Manage Page
@endsection

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
                            <th>Student Info</th>
                            <th>Enroll Date</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr class="{{ $enroll->enroll_status == 'Approved' ? 'bg-success' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $enroll->course->title  }}</td>
                                <td>{{ $enroll->student->name.' : '.'Mob No '.$enroll->student->mobile}}</td>
                                <td>{{ $enroll->enroll_date }}</td>
                                <td>{{ $enroll->payment_status }}</td>
                                <td>{{ $enroll->enroll_status}}</td>
                                <td>
                                    <a href="{{ route('admin.update-enroll-status', ['id' => $enroll->id]) }}" class="btn {{ $enroll->enroll_status == 'Pending' ? 'btn-warning' : 'btn-success' }} btn-sm" title="Update Course Status"><i class="fa fa-arrow-up"></i></a>
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
