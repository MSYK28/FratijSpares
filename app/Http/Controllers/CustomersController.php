<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Debt;
use App\Models\DebtDetails;
use Illuminate\Support\Facades\Request;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Debt::all();
        return view('pages.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = new Customers();
        $customers->name = Request::Input('name');
        $customers->number = Request::Input('number');

        $customers->save();

        return redirect('customers')->with('status', 'Customers profile created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers, $id)
    {
        $customers = Customers::find($id);

        $debts = Debt::all();
        $debt_details = DebtDetails::all();
        // $date = $debts->created_at;
        // dd($debt_details);

        return view('pages.customers.show', compact(['customers', 'debts', 'debt_details']));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers, $id)
    {
        $customers = Customers::find($id);
        return view('pages.customers.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers, $id)
    {
        $customers = Customers::find($id);
        $customers->name = Request::Input('name');
        $customers->number = Request::Input('number');

        $customers->update();

        return redirect('customers')->with('status', 'Customers profile created successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers, $id)
    {
        Customers::find($id)->delete();

        return redirect()->back()->with('Status', 'Customer information deleted successfully');
    }
}
