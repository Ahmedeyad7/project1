@extends('admin.parent')
@section('title' , 'trainer|Home')
@section('main-title' , 'trainer Home')
@section('sub-title' , 'trainer Home')
@section('styles')
@endsection
@section('content')
<div class="row">
    <a class="btn btn-primary" href="{{ route('admin.trainer.create') }}">Add New</a>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Specialty</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($trainers as $trainer)
                <tr>
                    <td scope="row">{{ $trainer->id }}</td>
                    <td>{{ $trainer->name }}</td>
                   <td> @if ($trainer->phone !== null)
                    {{ $trainer->phone }}
                    @else
                    NOT FOUND
                    @endif</td>
                    <td>{{ $trainer->specialty }}</td>
                    <td><img src="{{ asset('storage/trainers/'.$trainer->image) }}" style="width: 50px;height: 50px;border-radius: 50%"></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.trainer.edit' , $trainer->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm"  href="{{ route('admin.trainer.delete' , $trainer->id) }}">Delete</a>
                    </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center w-100">
            {{ $trainers->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
@section('scripts')
@endsection
