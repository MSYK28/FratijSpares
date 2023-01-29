<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use App\Models\Suppliers;
use Illuminate\Support\Facades\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stocks::all();
        return view('pages.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Suppliers::all();
        return view('pages.stocks.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stocks = new Stocks();
        $stocks->name = Request::input('name');
        $stocks->quantity = Request::input('quantity');
        $stocks->supplier = Request::input('supplier');
        $stocks->buying_price = Request::input('buying_price');
        $stocks->marked_price = Request::input('marked_price');

        $stocks->save();

        return redirect('/stocks')->with('success', 'Stock Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function show(Stocks $stocks, $id)
    {
        $stocks = Stocks::find($id);

        return view('pages.suppliers.show', compact('stocks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function edit(Stocks $stocks, $id)
    {
        $stock = Stocks::find($id);
        $suppliers = Suppliers::all();
        return view('pages.stocks.edit', compact(['stock', 'suppliers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stocks $stocks, $id)
    {
        $stocks = Stocks::find($id);
        $stocks->name = Request::input('name');
        $stocks->quantity = Request::input('quantity');
        $stocks->supplier = Request::input('supplier');
        $stocks->buying_price = Request::input('buying_price');
        $stocks->marked_price = Request::input('marked_price');

        $stocks->update();

        return redirect('stocks')->with('status', 'Stock info updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stocks $stocks)
    {
        Stocks::find($id)->delete();

        return redirect()->back()->with('status', 'Stock deleted successfully');
    }
}
