<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(7);
        return view('admin.category.index' , compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:20',
        ]);
        if (!$validator->fails()) {
            $categories = new Category();
            $categories->name = $request->get('name');
            $isSaved = $categories->save();
            session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:3|max:20',
            ],
        );
        $categories = Category::findOrFail($request->id);
        $categories->name = $request->get('name');
        $isUpdated = $categories->save();
        session()->flash('message', $isUpdated ? 'Updated is successfully' : 'Updated is fail');
        return redirect()->back();
    }
    public function delete($id){
        $categories = Category::destroy($id);
        return redirect()->route('admin.category.index');
        // $categories = Category::destroy($id);
        // if ($categories) {
        //     return response()->json(['icon' => 'Success', 'title' => 'Deleted Successfuly'], 200);
        // } else {
        //     return response()->json(['icon' => 'Error', 'title' => 'Deleted Failes'], 400);
        // }
    }
}
