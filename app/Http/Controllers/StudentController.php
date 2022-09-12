<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(7);
        return view('admin.student.index', compact('students'));
    }
    public function create()
    {
        return view('admin.student.create');
    }
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|string|min:3|max:50',
            'specialty' => 'nullable|string|min:3|max:50',
        ]);
        if (!$validator->fails()) {
            $students = new Student();
            $students->name = $request->get('name');
            $students->email = $request->get('email');
            $students->specialty = $request->get('specialty');
            $isSaved = $students->save();
            session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        return view('admin.student.edit', compact('students'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:3|max:30',
                'email' => 'required|string|min:3|max:50',
                'specialty' => 'nullable|string|max:50',
            ],
        );
        $students = Student::findOrFail($request->id);
        $students->name = $request->get('name');
        $students->email = $request->get('email');
        $students->specialty = $request->get('specialty');
        $isUpdated = $students->save();
        session()->flash('message', $isUpdated ? 'Updated is successfully' : 'Updated is fail');
        return redirect()->back();
    }
    public function delete($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->back();
    }
}
