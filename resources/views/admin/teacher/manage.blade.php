@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Teacher Info</h4>
                    @if($message = Session::get('message'))
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                    @endif
{{--                    <p class="card-title-desc">{{ Session::get('message') }}</p>--}}
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacher->name  }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->mobile }}</td>
                            <td><img src="{{ asset($teacher->image) }}" alt="" width="100" height="100"/></td>
                            <td>{{ $teacher->address }}</td>
                            <td>
                                <a href="{{ route('teacher.edit', ['id' => $teacher->id]) }}" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to edit this.....')"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('teacher.delete', ['id' => $teacher->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...')"><i class="fa fa-trash "></i></a>
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
