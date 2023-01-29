<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Debt;
use App\Models\DebtDetails;
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
        $debt = Debt::all();
        $debt_details = DebtDetails::all();


        $data = [];
        $data['Total Amount'] = number_format(OrderDetails::sum('price'), 2);
        $data['Total Cost'] = number_format(OrderDetails::sum('buying'), 2);
        $data['Profit'] = number_format(OrderDetails::sum('price') - OrderDetails::sum('buying') ,2);

        $data['Count'] = OrderDetails::sum('quantity');
        $data['Debt Amount'] = number_format((Debt::sum('subtotal'))- (Debt::sum('paid')) ,2) ?? 'No Debt Currently';

        $data['Date'] = Carbon::now();
        return view('pages.dashboard', compact(['order_details', 'orders', 'data', 'debt_details', 'debt']));
    }
}
