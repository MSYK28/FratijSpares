<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;

use App\Models\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('pages.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suppliers = new Suppliers();
        $suppliers->name = Request::Input('name');
        $suppliers->number = Request::Input('number');
        $suppliers->info = Request::Input('info');

        $suppliers->save();

        return redirect('suppliers')->with('status', 'Supplier profile created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers, $id)
    {
        $suppliers = Suppliers::find($id);
        return view('pages.suppliers.show', compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(Suppliers $suppliers, $id)
    {
        $suppliers = Suppliers::find($id);
        return view('pages.suppliers.edit', compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $suppliers, $id)
    {
        $suppliers = Suppliers::find($id);
        $suppliers->name = Request::input('name');
        $suppliers->number = Request::input('number');
        $suppliers->info = Request::input('info');

        $suppliers->update();

        return redirect('suppliers')->with('status', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliers $suppliers)
    {
        //
    }
}
