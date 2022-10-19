@extends('teacher.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Course enroll Info</h4>
                    <p class="card-title-desc">{{ Session::get('message') }}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Course Title</th>
                            <th>Starting Date</th>
                            <th>Total Enroll Student</th>
                            <th>Payment Complete</th>
                            <th>Payment InComplete</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['title']}}</td>
                                <td>{{ $item['starting_date']}}</td>
                                <td>{{ $item['total']}}</td>
                                <td>{{ $item['complete']}}</td>
                                <td>{{ $item['incomplete']}}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm "><i class="fa fa-book-open">View Detail</i></a>
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

