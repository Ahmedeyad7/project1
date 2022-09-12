@extends('admin.parent')
@section('title' , 'course|Home')
@section('main-title' , 'course Home')
@section('sub-title' , 'course Home')
@section('styles')
@endsection
@section('content')
<div class="row">
    <a class="btn btn-primary" href="{{ route('admin.course.create') }}">Add New</a>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                {{-- <th>category_id</th> --}}
                {{-- <th>trainer_id</th> --}}
                <th>SmallDesc</th>
                <th>Desc</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($a_courses as $course)
                <tr>
                    <td scope="row">{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    {{-- <td>{{ $course->category_id }}</td> --}}
                    {{-- <td>{{ $course->trainer_id }}</td> --}}
                    <td>{{ $course->small_desc }}</td>
                    <td>{{ $course->desc }}</td>
                    <td>{{ $course->price }}</td>
                    <td><img src="{{ asset('storage/courses/' . $course->image) }}" style="width: 50px;height: 50px;border-radius: 50%"></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.course.edit' , $course->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm"  href="{{ route('admin.course.delete' , $course->id) }}">Delete</a>
                    </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center w-100">
            {{ $a_courses->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
@section('scripts')
@endsection
