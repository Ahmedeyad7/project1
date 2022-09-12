<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(7);
        $courses = Student::orderBy('id', 'desc')->paginate(7);
        $course_students = CourseStudent::orderBy('id', 'desc')->paginate(7);
        return view('admin.CourseStudent.index' , compact('course_students' , 'courses','students'));
    }
    // public function create()
    // {
    //     return view('admin.course_student.create');
    // }
    // public function store(Request $request)
    // {
    //     $validator = Validator($request->all(), [
    //         'name' => 'required|string|min:3|max:50',
    //         'small_desc' => 'required|string|max:20',
    //         'desc' => 'required|string',
    //         'price' => 'required|integer',
    //         'category_id' => 'required|exists:categories,id',
    //         'trainer_id' => 'required|exists:trainers,id',
    //         'image'=> 'nullable|image|max:2048|mimes:png,jpeg,pdf',
    //     ]);
    //     if (!$validator->fails()) {
    //         $a_courses = new Course();
    //         if (request()->hasFile('image')) {
    //             $image = $request->file('image');
    //             $imageName = time() . 'image' . $image->getClientOriginalExtension();
    //             $image->move('storage/courses' , $imageName);
    //             $a_courses->image = $imageName;
    //         }
    //         $a_courses->name = $request->get('name');
    //         $a_courses->price = $request->get('price');
    //         $a_courses->small_desc = $request->get('small_desc');
    //         $a_courses->desc = $request->get('desc');
    //         $isSaved = $a_courses->save();
    //         session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');
    //         return redirect()->back();
    //     }
    // }
    // public function edit($id)
    // {
    //     $categories = Category::select('id' , 'name')->get();
    //     $trainers = Trainer::select('id' , 'name')->get();
    //     $a_courses = Course::findOrFail($id);
    //     return view('admin.course.edit', compact('a_courses' , 'trainers','categories'));
    // }
    // public function update(Request $request)
    // {
    //     $request->validate(
    //         [
    //         'name' => 'required|string|min:3|max:50',
    //         'small_desc' => 'required|string|max:20',
    //         'desc' => 'required|string',
    //         'price' => 'required|integer',
    //         'category_id' => 'required|exists:categories,id',
    //         'trainer_id' => 'required|exists:trainers,id',
    //         'image'=> 'nullable|image|max:2048|mimes:png,jpeg,pdf',
    //         ],
    //     );
    //     $a_courses = Course::findOrFail($request->id);
    //     $isUpdated = $a_courses->save();
    //     if ($isUpdated) {
    //         if (request()->hasFile('image')) {
    //             $image = $request->file('image');
    //             $imageName = time() . 'image' . $image->getClientOriginalExtension();
    //             $image->move('storage/courses' , $imageName);
    //             $a_courses->image = $imageName;
    //         }
    //         $a_courses->name = $request->get('name');
    //         $a_courses->price = $request->get('price');
    //         $a_courses->small_desc = $request->get('small_desc');
    //         $a_courses->desc = $request->get('desc');
    //         $isUpdated = $a_courses->save();
    //         session()->flash('message', $isUpdated ? 'Updated is successfully' : 'Updated is fail');
    //         return redirect()->back();
    //         }

    // }
    // public function delete($id){
    //     // Course::findOrFail($id)->delete();
    //     // return redirect()->back();
    //     $a_courses = Course::destroy($id);
    //     return redirect()->back();

    // }
}
