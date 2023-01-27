<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\OrderDetails;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Orders::all()->groupBy('created_at');
        $order_details = OrderDetails::all();

        $data = [];
        $data['Total Amount'] = number_format(Orders::sum('paid'), 2);
        $data['Count'] = OrderDetails::sum('numberOfUnits');

        $date = Carbon::now();
        return view('pages.dashboard', compact(['order_details', 'orders', 'date', 'data']));
    }
}
