<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer',[
            'customers' =>$customers
        ]);
    }

    public function create()
    {
        return view('new_customer');  // あなたのビュー名をここに記入してください
    }



    public function store(Request $request)
    {
        $customer = Customer::create([
            'customer_name' => $request->customer_name,
            'customer_country' => $request->customer_country,
            'customer_industry' => $request->customer_industry,
            'customer_shareholder' => $request->customer_shareholder,
            'customer_sanction' => $request->customer_sanction,
            'customer_equipment' => $request->customer_equipment,
            'customer_production' => $request->customer_production,
            'customer_financial' => $request->customer_financial,
            'customer_maintenance' => $request->customer_maintenance,
            'customer_address' => $request->customer_address,
            'customer_access' => $request->customer_access,
            'customer_remarks' => $request->customer_remarks,
        ]);
    
        return redirect()->route('customers.index');  
    }
    



    /**
     * Display the specified resource.
     */

        public function show(Customer $customer)
{
    return view('customer_each', [
        'customer' => $customer,
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_country' => 'required|string|max:255',
            'customer_industry' => 'required|string|max:255',
            'customer_shareholder' => 'required|string|max:255',
            'customer_sanction' => 'required|string|max:255',
            'customer_equipment' => 'required|string|max:255',
            'customer_production' => 'required|string|max:255',
            'customer_financial' => 'required|string|max:255',
            'customer_maintenance' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_access' => 'required|string|max:255',
            'customer_remarks' => 'required|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($data);

        return redirect()->route('customers.show', $customer)->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
