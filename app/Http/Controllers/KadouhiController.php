<?php

namespace App\Http\Controllers;

use App\Models\Kadouhi;
use App\Models\Project;
use Illuminate\Http\Request;

class KadouhiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index($project_id)
     {
         $project = Project::findOrFail($project_id);  // 特定のプロジェクトのみを取得します。
         $kadouhi = Kadouhi::all();
     
         return view('kadouhi', [
             'kadouhi' => $kadouhi,
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

        $data = $request->validate([
            'total_traveling_days' => 'required|numeric',
            'total_working_days' => 'required|numeric',
            'total_holidays' => 'required|numeric',
            'total_overtime_rate' => 'required|numeric',
            'total_extra_charge' => 'required|numeric',
            'project_id' => 'required|numeric', // これを追加
        ]);


        $kadouhi = Kadouhi::create($data);
        
        return redirect()->route('kadouhi.index', ['project_id' => $data['project_id']]);  
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Kadouhi $kadouhi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kadouhi $kadouhi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kadouhi $kadouhi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kadouhi $kadouhi)
    {
        //
    }

    public function showKadouhi(Request $request) {
        $projectId = $request->input('project_id');
        $project = Project::find($projectId);
        return view('kadouhi', ['project' => $project]);
    }
    
    
    
}
