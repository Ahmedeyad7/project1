@extends('admin.parent')
@section('title', 'Edit student')
@section('main-title', 'Edit student')
@section('sub-title', 'student / Edit')
@section('styles')
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex justify-content-between mb-3">
                    <h6>Catrgories/Edit/{{ $students->name }}</h6>
                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Of student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.student.update') }}" method="POST">
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
                            <input type="hidden" name="id" value="{{ $students->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        value={{ $students->name }}>
                                </div>
                                    <div class="form-group">
                                        <label for="email"> email</label>
                                        <input name="email" type="email" class="form-control" id="email"
                                            value={{ $students->email }}>
                                    </div>
                                        <div class="form-group">
                                            <label for="specialty"> specialty</label>
                                            <input name="specialty" type="text" class="form-control" id="specialty"
                                                value={{ $students->specialty }}>
                                        </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.student.index') }}" class="btn btn-secondary">Return</a>
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
@endsection
