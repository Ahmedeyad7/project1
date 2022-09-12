<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\SiteContent;
use App\Models\Student;
use App\Models\Test;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners= SiteContent::select('content')->where('name' , 'banner')->first();
        $courses= Course::orderBy('id' , 'desc')->paginate(3);
        $trainers= Trainer::all();
        $categories= Category::all();
        // dd($courses);
        $courses_count= Course::count();
        $trainers_count= Trainer::count();
        $students_count= Student::count();
        $tests= Test::all();
        return view('front.index',compact('banners','courses','trainers','categories','categories','courses_count','trainers_count','students_count','tests'));
    }
}
