@extends('admin.parent')
@section('title', 'Create course')
@section('main-title', 'Create course')
@section('sub-title', 'course / Create')
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
                            <h3 class="card-title">Create Data Of course</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
                            {{-- لتأمين البيانات --}}
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif
                            @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="name">
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control mb-4" name="category_id"
                                        aria-label="Default select example">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control mb-4" name="trainer_id"
                                        aria-label="Default select example">
                                        @foreach ($trainers as $trainer)
                                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="small_desc"> small_desc</label>
                                    <input name="small_desc" type="text" class="form-control" id="small_desc"
                                        placeholder="small_desc">
                                </div>
                                <div class="form-group">
                                    <label for="desc"> desc</label>
                                    <textarea name="desc" class="form-control" id="desc" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price"> price</label>
                                    <input name="price" type="number" class="form-control" id="price"
                                        placeholder="price">
                                </div>
                                <div class="form-group">
                                    <label for="image"> image</label>
                                    <input name="image" type="file" class="form-control" id="image"
                                        placeholder="image">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Store</button>
                                <a href="{{ route('admin.course.index') }}" class="btn btn-secondary">Return</a>
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
            store('admin/dashboard/courses', formData)
        }
</script> --}}
@endsection
