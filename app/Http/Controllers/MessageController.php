<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function newsletter(Request $request){
        $data = $request->validate([
            'email' => "required|email|max:191"
        ]);
        $data = new Newsletter();
        $data->email = $request->get('email');
        $isSaved = $data->save();
        session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');
        return redirect()->back();
    }

    public function contect(Request $request){
        $data = $request->validate([
            'name' => "required|string|max:191",
            'email' => "required|email|max:191",
            'subject' => "nullable|string|max:191",
            'message' => "required|string",
        ]);
        $data = new Message();
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->subject = $request->get('subject');
        $data->message = $request->get('message');
        $isSaved = $data->save();
        session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');
        return redirect()->back();

    }
    public function enroll(Request $request){
        $data = $request->validate([
            'name' => "required|string|max:191",
            'email' => "required|email|max:191",
            'specialty' => "nullable|string|max:191",
            'course_id' => "required|exists:courses,id",
            'student_id' => "nullable|exists:students,id",
        ]);
        // $old_students = Student::select('id')->where('email' , $data['email'])->first();
        // if ($old_students == null) {
        //     $students = Student::create([
        //         'name' => $data['name'],
        //         'email' => $data['email'],
        //         'specialty'=> $data['specialty']
        //     ]);
        //     $student_id = $students->id;
        // }
        // else{
        //     $student_id = $old_students->id;
        //     if ($data['name'] !== null) {
        //         $old_students->update(['name' => $data['name']]);
        //     }
        //     if ($data['specialty'] !== null) {
        //         $old_students->update(['specialty' => $data['specialty']]);
        // }
        // }

        // $old_students = Student::select('id')->where('email' , $data['email'])->first();
        // if ($old_students == null) {
        $students = new Student();
        $students->name = $request->get('name');
        $students->email = $request->get('email');
        $students->specialty = $request->get('specialty');
        $student_id = $students->id;
    // }
        // else{
            // $student_id = $old_students->id;
            // if ($data['name'] !== null) {
                // $old_students->update(['name' => $data['name']]);
            // }
            // if ($data['specialty'] !== null) {
                // $old_students->update(['specialty' => $data['specialty']]);
        // }
        // }

        $isSaved = $students->save();
        session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');

        DB::table('course_student')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }
}
