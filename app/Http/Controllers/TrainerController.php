<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::orderBy('id', 'desc')->paginate(7);
        return view('admin.trainer.index' , compact('trainers'));
    }
    public function create()
    {
        return response()->view('admin.trainer.create');
    }
    public function store(Request $request)
    {

        // $trainers = $request->validate([
        //     'name' => 'required|string|min:3|max:50',
        //     'phone' => 'required|string|min:3|max:20',
        //     'specialty' => 'required|string|min:3|max:50',
        //     'image'=> 'required|image|max:2048|mimes:png,jpeg,jpg',
        // ]);
        // $trainers = new Trainer();
        // $new_name = $trainers['image']->hashName();
        // Image::make($trainers['image'])->save(public_path('storage/trainers/'.$new_name));
        // $trainers['image'] = $new_name;
        //     $trainers->name = $request->get('name');
        //     $trainers->phone = $request->get('phone');
        //     $trainers->specialty = $request->get('specialty');

        //     $isSaved = $trainers->save();
        //     session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');
        //     return redirect()->back();




        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'phone' => 'nullable|string|min:3|max:20',
            'specialty' => 'required|string|min:3|max:50',
            'image'=> 'nullable|image|max:2048|mimes:png,jpeg,pdf',
        ]);
        if (!$validator->fails()) {
            $trainers = new Trainer();
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image' . $image->getClientOriginalExtension();
                $image->move('storage/trainers/' , $imageName);
                $trainers->image = $imageName;
            }

            $trainers->name = $request->get('name');
            $trainers->phone = $request->get('phone');
            $trainers->specialty = $request->get('specialty');

            $isSaved = $trainers->save();
            session()->flash('message', $isSaved ? 'created is successfully' : 'created is fail');
            return redirect()->back();
        }


        // $trainers = $request->validate([
        //     'name' => 'required|string|min:3|max:50',
        //     'phone' => 'required|string|min:3|max:20',
        //     'specialty' => 'required|string|min:3|max:50',
        //     'image'=> 'required|image|max:2048|mimes:png,jpeg,jpg',
        // ]);
        // $new_name = $trainers['image']->hashName();
        // Image::make($trainers['image'])->save(public_path('image/trainers/'.$new_name));
        // $trainers['image'] = $new_name;
        // Trainer::create($trainers);
        // return redirect()->back();

    }
    public function edit($id)
    {
        $trainers = Trainer::findOrFail($id);
        return response()->view('admin.trainer.edit', compact('trainers'));
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:3|max:50',
                'phone' => 'nullable|string|min:3|max:20',
                'specialty' => 'required|string|min:3|max:50',
                'image'=> 'nullable|image|max:2048|mimes:png,jpeg,pdf,jpg',
            ],
        );
        $trainers = Trainer::findOrFail($request->id);
        $isUpdated = $trainers->save();
        if ($isUpdated) {
            if (request()->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . 'image' . $image->getClientOriginalExtension();
                $image->move('storage/trainers' , $imageName);
                $trainers->image = $imageName;
            }
            $trainers->name = $request->get('name');
            $trainers->phone = $request->get('phone');
            $trainers->specialty = $request->get('specialty');
            $isUpdated = $trainers->save();
            session()->flash('message', $isUpdated ? 'Updated is successfully' : 'Updated is fail');
            return redirect()->back();
            }

    }
    public function delete($id){
        // Trainer::findOrFail($id)->delete();
        // return redirect()->back();
        $trainers = Trainer::destroy($id);
        return redirect()->route('admin.trainer.index');
    }
}
