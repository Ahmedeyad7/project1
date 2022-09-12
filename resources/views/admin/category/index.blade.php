@extends('admin.parent')
@section('title' , 'Category|Home')
@section('main-title' , 'Category Home')
@section('sub-title' , 'Category Home')
@section('styles')
@endsection
@section('content')
<div class="row">
    <a class="btn btn-primary" href="{{ route('admin.category.create') }}">Add New</a>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td scope="row">{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.category.edit' , $category->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm"  href="{{ route('admin.category.delete' , $category->id) }}">Delete</a>
                        {{-- <a href="#" class="btn btn-danger" onclick="performDestroy({{ $categories->id }})">Delete</a> --}}

                    </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center w-100">
            {{ $categories->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
@section('scripts')
{{-- <script>
    function performDestroy(id , referance) {
        confirmDestroy('/category/'+id , referance)
    }
</script> --}}
@endsection
