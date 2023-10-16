<?php

namespace App\Http\Controllers;

use App\Models\Logi;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($project)
    {
        $project = Project::findOrFail($project);  // 特定のプロジェクトのみを取得します。

        // 以下の行で、特定のproject_idに紐づくLogisのみを取得するように変更します。
    $logi = Logi::where('project_id', $project->id)->orderBy('start_day', 'asc')->orderBy('start_time', 'asc')->get();

        return view('logi', [
            'logis' => $logi,
            'project' => $project
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $project) {
        $logi = new Logi;
        $logi->project_id = $project; // ProjectのIDをproject_idとして保存
        $logi->title = $request->title;
        $logi->type = $request->type;
        $logi->start_day = $request->start_day;
        $logi->start_time = $request->start_time;
        $logi->start_timezone = $request->start_timezone;
        $logi->end_day = $request->end_day;
        $logi->end_time = $request->end_time;
        $logi->end_timezone = $request->end_timezone;
        $logi->pic = $request->pic;        
        $logi->logi_remarks = $request->logi_remarks;
        $logi->save();
        
        return redirect()->route('logi.index', ['project' => $project]);

    }
    

    /**
     * Display the specified resource.
     */
    public function show(Logi $logi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($project_id, $logi_id)
    {
        $project = Project::findOrFail($project_id);
        $logi = Logi::findOrFail($logi_id);
        return view('logi.edit', compact('project', 'logi'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $project, Logi $logi)
{
    $logi->update([
        'title' => $request->title,
        'type' => $request->type,
        'start_day' => $request->start_day,
        'start_time' => $request->start_time,
        'start_timezone' => $request->start_timezone,
        'end_day' => $request->end_day,
        'end_time' => $request->end_time,
        'end_timezone' => $request->end_timezone,
        'pic' => $request->pic,
        'logi_remarks' => $request->logi_remarks
        

    ]);
    
    return redirect()->route('logi.index', ['project' => $project])->with('success', 'Updated successfully!');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Logi $logi)
    {
        $logi->delete();
        return redirect()->route('logi.index', ['project' => $project]);
    }
}

