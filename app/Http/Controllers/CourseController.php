<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class CourseController extends Controller
{
    public function category($id){
        $categories = Category::findOrFail($id);
        // $trainers = Trainer::findOrFail($id);
        $courses= Course::select('id','name','small_desc','category_id','trainer_id','image','price')->orderBy('id' , 'desc')->paginate(6);
        return view('front.category', compact('categories' , 'courses'));
    }
    public function show($id , $cat_id){
        $data['courses']= Course::findOrFail($cat_id);
        $data['trainers']= Trainer::findOrFail($cat_id);
        // $data['trainers']= Trainer::first();
        $data['categories']= Category::findOrFail($id);
        return view('front.show')->with($data);
    }
}
