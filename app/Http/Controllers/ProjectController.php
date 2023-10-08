<?php

namespace App\Http\Controllers;

use App\Models\check;
use App\Models\customer;
use App\Models\price;
use App\Models\project;
use Illuminate\Http\Request;
use Psy\VersionUpdater\Checker;

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
    public function show(string $id)
    {
        $project = Project::find($id);
        if (!$project) {
            // プロジェクトが見つからない場合は、プロジェクトの一覧ページにリダイレクトします。
            return redirect()->route('projects.index');
        }
        return view('project_show', ['project' => $project]);
    }
    


    public function kadouhiDetails() {
        return view('project_details.kadouhi');
    }
    
    
    public function customer() {
        $customers = Customer::all(); // あなたのモデルとロジックに応じて
        return view('customer', ['customers' => $customers]);
    }

    public function check() {
        $checks = check::all(); // あなたのモデルとロジックに応じて
        return view('check', ['checks' => $checks]);
    }

    public function price() {
        $prices = price::all(); // あなたのモデルとロジックに応じて
        return view('price', ['prices' => $prices]);
    }

}  