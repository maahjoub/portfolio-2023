<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectSkill;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('skills')->get();
        $skills = Skills::all();
        return view('projects.index', compact('projects', 'skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'progress' => 'required|numeric',
            'image' => 'required|image',
            'github' => 'required',
            'project_url' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'skill' => 'required'
        ]);

        if ($validated) {
            DB::beginTransaction();
            try {
                $img = '';
                if ($request->file('image')) {
                    $image = $request->file('image');
                    $filename = date('YmdHi') . $image->getClientOriginalName();
                    $image->move(public_path('image/projects'), $filename);
                    $img = $filename;
                }
                $project = Project::create([
                    'name' => $request->name,
                    'progress' => $request->progress,
                    'img' => $img,
                    'short_desc' => $request->short_desc,
                    'description' => $request->description,
                    'github_url' => $request->github,
                    'project_url' => $request->project_url,
                ]);
                if ($request->skill){
                    foreach ($request->skill as $skill){
                        ProjectSkill::create([
                           'project_id'=> $project->id,
                           'skill_name' => $skill,
                            'project_type' => 'App\Models\Project'
                        ]);
                    }
                }
                DB::commit();
                return redirect()->back()->with('success', 'The Skill Added Successfully');
            }catch (\Exception $e){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'progress' => 'required|numeric',
            'github' => 'required',
            'project_url' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
        ]);
        if ($validated) {
            try {
            $project = Project::with('skills')->where('id', $request->id)->get();
            $project->name = $request->name;
            $project->progress = $request->progress;
            $project->short_desc = $request->short_desc;
            $project->description = $request->description;
            $project->github_url = $request->github;
            $project->project_url = $request->project_url;
            $img = '';
            if ($request->file('image')) {
                if (file_exists(public_path('image/projects' . $project->img))) {
                    unlink(public_path('image/projects' . $project->img));
                }
                $image = $request->file('image');
                $filename = date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('image/projects'), $filename);
                $img = $filename;
                $project->img = $img;
            }

            if ($request->skill){
                $proSkill = ProjectSkill::where('project_id' , $request->id)->get();
                foreach ($request->skill as $skill){
                    dd($request->skill);
//                    $skill->skill_name = $skill;
                }
            }
            $project->save();
            return redirect()->back()->with('success', 'The Skill Added Successfully');
        }catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if (file_exists(public_path('image/projects/' . $project->img))) {
            unlink(public_path('image/projects/' .$project->img));
        }
        $project->delete();
        return redirect()->back();
    }
}
