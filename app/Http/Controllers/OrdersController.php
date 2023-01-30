<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Debt;
use App\Models\DebtDetails;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Stocks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Stocks::all();
        $customers = Customers::all();
        $orders = Orders::all();

        return view('pages.orders.index', compact([ 'products', 'customers', 'orders']));
    }

    public function test()
    {
        return view('pages.orders.test');
        # code...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentTime = Carbon::now();

        if(Customers::where('name', $request->customer)->exists())
        {
            $debtOrder = new Debt();
            $subtotal = $request->subtotal;
            $paid = $request->paid;
            $customer = $request->customer;
    
            $debtOrder = [
                'subtotal'   => $subtotal,
                'paid'       => $paid,
                'customer'   => $customer,
                'created_at' => $currentTime,
            ];
    
            DB::table('debts')->insert($debtOrder);

            $product_id = $request->product_id;
            $name = $request->name;
            $quantity = $request->numberOfUnits;
            $price = $request->price;
            $buying = $request->buy_price;
            $discount = $request->discount;
            $customer = $request->customer;
            $currentTime = Carbon::now();

            for ($i=0; $i < count($name) ; $i++) { 
                $datasave = [
                    'product_id'    => $product_id[$i],
                    'name'          => $name[$i],
                    'quantity'      => $quantity[$i],
                    'price'         => $price[$i],
                    'buying'        => $buying[$i],
                    'customer'      => $customer,
                    'created_at'    => $currentTime,
                ];

                DB::table('debt_details')->insert($datasave);
                
                foreach ($datasave as $key => $value) {
                    $stocks = Stocks::where('id', $request->product_id)->get();
                   
                    if ($stocks) {
                        $newQty = ($stocks[$i]->quantity) - ($request->numberOfUnits[$i]);
                        Stocks::where('id', $request->product_id)
                                ->update(['quantity' => $newQty]);
                    }                    
                    
                }
            }

            return redirect('/dashboard')->with('success', 'Completed');

        }
        else
        {
            //CASH SALE STARTS HERE
            $cashOrder = new OrderDetails();
            $product_id = $request->product_id;
            $name = $request->name;
            $quantity = $request->numberOfUnits;
            $price = $request->price;
            $buying = $request->buy_price;
            $discount = $request->discount;
            $currentTime = Carbon::now();

            for ($i=0; $i < count($name) ; $i++) { 
                $datasave = [
                    'product_id'    => $product_id[$i],
                    'name'          => $name[$i],
                    'quantity'      => $quantity[$i],
                    'price'         => $price[$i],
                    'buying'        => $buying[$i],
                    'discount'      => $discount,
                    'created_at'    => $currentTime,
                ];

                // dd($datasave);
                DB::table('order_details')->insert($datasave);
                
                // $quantity = $datasave
                foreach ($datasave as $key => $value) {
                    $stocks = Stocks::where('id', $request->product_id)->get();
                    if ($stocks) {

                        $newQty = ($stocks[$i]->quantity) - ($request->numberOfUnits[$i]);
                        
                        // $stocks->update();
                        
                        // dd($newQty);
                        Stocks::where('id', $request->product_id)
                                ->update(['quantity' => $newQty]);
                    }                    
                    
                }
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
