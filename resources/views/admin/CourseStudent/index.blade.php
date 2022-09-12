@extends('admin.parent')
@section('title' , 'CourseStudent|Home')
@section('main-title' , 'CourseStudent Home')
@section('sub-title' , 'CourseStudent Home')
@section('styles')
@endsection
@section('content')
<div class="row">
    {{-- <a class="btn btn-primary" href="{{ route('admin.course_students.create') }}">Add New</a> --}}
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>course_id</th>
                <th>student_id</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($course_students as $course_student)
                <tr>
                    <td scope="row">{{ $student->id }}</td>
                    <td>{{ $course_student->course_id }}</td>
                    <td>{{ $course_student->student_id }}</td>

                    <td>
                        {{-- <a class="btn btn-info btn-sm" href="{{ route('admin.course_students.edit' , $student->id) }}">Edit</a> --}}
                        {{-- <a class="btn btn-danger btn-sm"  href="{{ route('admin.course_students.delete' , $student->id) }}">Delete</a> --}}
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
