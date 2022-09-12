@extends('admin.parent')
@section('title', 'Create category')
@section('main-title', 'Create category')
@section('sub-title', 'category / Create')
@section('styles')
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Data Of category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.category.store') }}" method="POST">
                            {{-- لتأمين البيانات --}}
                            @csrf
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                              </div>
                            @endif
                            @if(session()->has('message'))
                              <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                {{ session('message') }}
                              </div>
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input
                                    name="name"
                                    type="text" class="form-control" id="name"
                                        placeholder="name">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit"  class="btn btn-primary">Store</button>
                                <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Return</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
{{-- <script>
    function performStore() {
        let formData = new FormData()
        formData.append('name' , document.getElementById('name').value)
        store('/admin/dashboard/category' , formData)
    }
</script> --}}
@endsection
