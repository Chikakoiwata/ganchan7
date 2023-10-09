<?php

namespace App\Http\Controllers;

use App\Models\Check;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checks = Check::all();
        return view('check',[
            'checks' =>$checks
        ]);
    }

    public function create()
    {
        return view('new_check');  // あなたのビュー名をここに記入してください
    }



    public function store(Request $request)
    {
        $check = Check::create([
            'check_country' => $request->check_country,
            'visa' => $request->visa,
            'pe' => $request->pe,
            'income_tax' => $request->income_tax,
            'vat' => $request->vat,
            'consumption_tax' => $request->consumption_tax,
            'tax_reference' => $request->tax_reference,
            'danger' => $request->danger,
            'check_remarks' => $request->check_remarks,
        ]);

        return redirect()->route('checks.index');  
    }
    



    /**
     * Display the specified resource.
     */

        public function show(Check $check)
{
    return view('check_each', [
        'check' => $check,
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Check $check)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'check_country' => 'required|string|max:255',
            'visa' => 'required|string|max:255',
            'pe' => 'required|string|max:255',
            'income_tax' => 'required|string|max:255',
            'vat' => 'required|string|max:255',
            'consumption_tax' => 'required|string|max:255',
            'tax_reference' => 'required|string|max:255',
            'danger' => 'required|string|max:255',
            'check_remarks' => 'required|string|max:255',
        ]);

        $check = Check::findOrFail($id);
        $check->update($data);

        return redirect()->route('checks.show', $check)->with('success', 'Check updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Check $check)
    {
        //
    }
}
