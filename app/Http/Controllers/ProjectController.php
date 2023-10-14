<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Customer;
use App\Models\DetailProject;
use App\Models\Price;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
  
    public function create()
    {
        $customers = Customer::all();  // 顧客情報を取得
        return view('new_project', ['customers' => $customers]);  // 変数をビューに渡す
    }



    //削除・編集
   
public function update(Request $request, Project $project)
{
    $project->update($request->all());
    return redirect()->route('projects.index');
}

public function destroy(Project $project)
{
    $project->delete();
    return redirect()->route('projects.index');
}
    
public function edit($id)
{
    $project = Project::find($id);
    $customers = Customer::all();  // すべての顧客を取得

    return view('projects.edit', compact('project', 'customers'));
}




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Project = Project::create([
            'status' => $request->status,
            'customer' => $request->customer,
            'start' => $request->start,
            'end' => $request->end,
            'number' => $request->number,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('projects.index');  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
        $detailproject = DetailProject::where('project_id', $id)->first();
    
// $detailprojectがnullの場合、新しいインスタンスを作成
if (!$detailproject) {
    $detailproject = new DetailProject();
}


        return view('project_show', compact('project', 'detailproject'));
    }
    



    public function kadouhiDetails() {
        return view('project_details.kadouhi');
    }
    
    
    public function customer() {
        $customers = Customer::all(); // あなたのモデルとロジックに応じて
        return view('customer', ['customers' => $customers]);
    }

    public function check() {
        $checks = Check::all(); // あなたのモデルとロジックに応じて
        return view('check', ['checks' => $checks]);
    }

    public function price() {
        $prices = Price::all(); // あなたのモデルとロジックに応じて
        return view('price', ['prices' => $prices]);
    }

}  