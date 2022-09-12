@extends('admin.parent')
@section('title', 'Create trainer')
@section('main-title', 'Create trainer')
@section('sub-title', 'trainer / Create')
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
                            <h3 class="card-title">Create Data Of trainer</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.trainer.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="phone"> phone</label>
                                    <input
                                    name="phone"
                                    type="text" class="form-control" id="phone"
                                        placeholder="phone">
                                </div>
                                <div class="form-group">
                                    <label for="specialty"> specialty</label>
                                    <input
                                    name="specialty"
                                    type="text" class="form-control" id="specialty"
                                        placeholder="specialty">
                                </div>
                                <div class="form-group">
                                    <label for="image"> image</label>
                                    <input
                                    name="image"
                                    type="file" class="form-control" id="image"
                                        placeholder="image">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit"   class="btn btn-primary">Store</button>
                                <a href="{{ route('admin.trainer.index') }}" class="btn btn-secondary">Return</a>
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
            formData.append('name', document.getElementById('name').value)
            formData.append('phone', document.getElementById('phone').value)
            formData.append('specialty', document.getElementById('specialty').value)
            formData.append('image', document.getElementById('image').files[0])
            store('admin/dashboard/trainer/store', formData)
        }
</script> --}}
@endsection
