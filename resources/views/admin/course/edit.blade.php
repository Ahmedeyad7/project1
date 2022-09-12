@extends('admin.parent')
@section('title', 'Edit course')
@section('main-title', 'Edit course')
@section('sub-title', 'course / Edit')
@section('styles')
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex justify-content-between mb-3">
                    <h6>Courses/Edit/{{ $a_courses->name }}</h6>
                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Of course</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.course.update') }}" method="POST">
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
                            <input type="hidden" name="id" value="{{ $a_courses->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        value={{ $a_courses->name }}>
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control mb-4" name="category_id"
                                        aria-label="Default select example">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if($a_courses->category_id == $category->id) selected
                                            @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control mb-4" name="trainer_id"
                                        aria-label="Default select example">
                                        @foreach ($trainers as $trainer)
                                            <option value="{{ $trainer->id }}"@if($a_courses->trainer_id == $trainer->id) selected @endif>{{ $trainer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="small_desc"> small_desc</label>
                                    <input name="small_desc" type="text" class="form-control" id="small_desc"
                                        placeholder="small_desc" value="{{ $a_courses->small_desc }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc"> desc</label>
                                    <textarea name="desc" class="form-control" id="desc" cols="30" rows="10">{{ $a_courses->desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price"> price</label>
                                    <input name="price" type="text" class="form-control" id="price"
                                        value={{ $a_courses->price }}>
                                </div>
                                <div class="form-group">
                                    <label for="image"> image</label>
                                    <input name="image" type="file" class="form-control" id="image"
                                        value={{ $a_courses->image }}>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
@endsection
