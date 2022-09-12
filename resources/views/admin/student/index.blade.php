@extends('admin.parent')
@section('title' , 'student|Home')
@section('main-title' , 'student Home')
@section('sub-title' , 'student Home')
@section('styles')
@endsection
@section('content')
<div class="row">
    <a class="btn btn-primary" href="{{ route('admin.student.create') }}">Add New</a>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Specialty</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td scope="row">{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->specialty }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.student.edit' , $student->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm"  href="{{ route('admin.student.delete' , $student->id) }}">Delete</a>
                    </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center w-100">
            {{ $students->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
@section('scripts')
@endsection
