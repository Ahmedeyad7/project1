<?php
use App\Models\Category;
use App\Models\Course;


$categories =Category::all();


$categories =Course::all();
?>

@extends('front.parent')
@section('title', 'Course')
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
                            <h2>Our Courses</h2>
                            {{-- <p>Home<span>/</span>Courses<span>/</span>{{ $categories->name }}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($courses as $course)
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <img src="{{ asset('storage/courses/' . $course->image) }}" class="special_img" alt="">
                            <div class="special_cource_text">
                                <h4>{{ $course->price }}</h4>
                                @foreach ($categories as $category)
                                @if($category->id == $course->category_id)
                                <a href="{{ route('front.category' , $category->id) }}" class="btn_4">{{ $category->name }}</a>
                                @endif
                                @endforeach

                                <a href="{{ route('front.show' , [$course->category->id , $course->id]) }}">
                                    <h3>{{ $course->name }}</h3>
                                </a>
                                <p>{{ $course->small_desc }}</p>
                                <div class="author_info" >
                                    <div class="author_img">
                                        {{-- <img src="{{ asset('storage/trainers/'.$course->trainers->image) }}" style="width: 50px !important;height: 50px !important;border-radius: 50% !important;"> --}}
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            {{-- <h5>{{ $course->trainer->name }}</h5> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center w-100 m-5">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
@endsection
@section('scripts')
@endsection
