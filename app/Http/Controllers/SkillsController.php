<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skills::all();
        return view('skills.index', compact('skills'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:skills|max:255',
            'progress' => 'required|numeric',
            'image' => 'required|image',
        ]);
        if ($validated)
        {
            $img = '';
            if($request->file('image')){
                $image = $request->file('image');
                $filename= date('YmdHi').$image->getClientOriginalName();
                $image-> move(public_path('image/skills'), $filename);
                $img = $filename;
            }
            Skills::create([
               'name' => $request->name,
               'progress' => $request->progress,
               'img' => $img,
            ]);
            return redirect()->back()->with('success', 'The Skill Added Successfully');
        }
        return redirect()->back()->withErrors('errors');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $skill = Skills::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'progress' => 'required|numeric',
        ]);
        if ($validated) {
            $skill->name =  $request->name;
            $skill->progress =  $request->progress;
            $img = '';
            if ($request->file('image')) {
                if (file_exists(public_path('image/' . $skill->img))) {
                    unlink(public_path('image/' . $skill->img));
                }
                $image = $request->file('image');
                $filename = date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('image'), $filename);
                $img = $filename;
                $skill->img =  $img;
            }
           $skill->save();
           return redirect()->back()->with('success', 'The Skill Added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skills::findOrFail($id);
        if (file_exists(public_path('image/skills/' . $skill->img))) {
            unlink(public_path('image/skills/' .$skill->img));
        }
        $skill->delete();
        return redirect()->back();
    }
}
