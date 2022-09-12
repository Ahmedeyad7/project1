@extends('front.parent')
@section('title' , 'Details')
@section('styles')
@endsection
@section('content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Course Details</h2>
                            {{--  --}}
                            <p>Home<span>/</span>Courses<span>/</span>{{ $categories->name }}<span>/</span>{{ $courses->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{ asset('/storage/courses/' . $courses->image) }}" style="width: 700px !important; height: 450px !important; object-fit: cover;">
                    </div>
                    <div class="content_wrapper py-5">
                        {{ $courses->desc }}
                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top mb-3">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Trainer’s Name</p>
                                    <span class="color">{{ $trainers->name }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Course Fee </p>
                                    <span>{{ $courses->price }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form class="form-contact contact_form" action="{{ route('front.message.enroll') }}" method="POST" id="contactForm">
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
                        <div class="row">
                            <input type="hidden" name="course_id" value="{{ $courses->id }}">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                              <input class="form-control" name="specialty" id="specialty" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter specialty'" placeholder = 'Enter specialty'>
                            </div>
                          </div>
                        </div>
                        <div class="form-group mt-3">
                          <button type="submit" class="button button-contactForm btn_1">Enroll</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->
@endsection
@section('scripts')
@endsection
