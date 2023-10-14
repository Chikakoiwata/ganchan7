<?php

namespace App\Http\Controllers;

use App\Models\DetailProject;
use App\Models\Project;
use Illuminate\Http\Request;

class DetailProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($project_id)
    {
        $project = Project::findOrFail($project_id);  // 特定のプロジェクトのみを取得します。
        
        // 特定のプロジェクトIDに紐づくDetailProjectを取得
        $detailproject = DetailProject::where('project_id', $project_id)->first();
    
        return view('project_show', [
            'detailproject' => $detailproject,  // 'project_show'から'detailproject'に変更
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailProject $detailProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailProject $detailProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailProject $detailProject)
    {
        //
    }

    public function updateCheckboxes(Request $request, $id)
    {
        $project = Project::find($id);
        $detailProject = $project->detailProject ?? new DetailProject();
        $detailProject->project_id = $id; // project_idを設定

        // チェックボックスのデータを取得して保存
        $detailProject->estimate_submitted = $request->input('estimate_submitted') ? true : false;
        $detailProject->po_received = $request->input('po_received') ? true : false;
        $detailProject->tax_checked = $request->input('tax_checked') ? true : false;
        $detailProject->danger_checked = $request->input('danger_checked') ? true : false;
        $detailProject->logi_arranged = $request->input('logi_arranged') ? true : false;
        $detailProject->estimate_no = $request->input('estimate_no');
        $detailProject->po_no = $request->input('po_no');
        $detailProject->project_remarks = $request->input('project_remarks');
    
        $detailProject->save();

        // 保存後のリダイレクトや表示メッセージなど、必要に応じて処理を追加

        return redirect()->route('detailprojects.index', ['project' => $id]);
    }
}

