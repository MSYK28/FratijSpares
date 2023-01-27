@extends('layouts.app', [
'class' => '',
'elementActive' => 'orders'
])

@section('content')
@livewireStyles

<div class="content">
    @include('pages.nav-slider')

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">

            <div class="row my-3">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Stocks</h5>
                            <p class="card-category">List of stocks</p>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="products">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5" id="cash-sales">
                    <div class="card">
                        <form action="{{ url('/orders') }}" method="post">
                            @csrf

                            <div class="card-header">
                                <div class="buttons float-right">
                                    <div class="itemcount">
                                        <span class="btn btn-sm btn-warning total-items-in-cart">0 items</span>
                                    </div>
                                </div>
                                <h5 class="card-title">Total</h5>
                                <p class="card-category">Sum total</p>
                                <hr>
                                <div class="row d-flex sale_card">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount" class="control-label">Discount</label>
                                            <input type="number" name="discount" id="discount"
                                                class="form-control discount" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="paid" class="control-label">Paid</label>
                                            <input type="number" name="paid" id="paid" class="form-control paid"
                                                placeholder="0.00" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Sale Type</label>
                                        <div id="sale_type" name="button" class="button btn btn-sm btn-primary sale-type" onclick="showHideCustomer()">
                                            Cash
                                        </div>
                                    </div>
                                    <div class="customer-input-field hide">
                                        <div class="customer-details form-group" id="customer_details">
                                            <label class="control-label" for="customer">Customer</label>
                                            <select name="customer" id="customer" class="form-control">
                                                @foreach ($customers as $customer)
                                                <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="card-body">

                                {{-- CART ITEMS RENDERED HERE--}}
                                <div class="cart-items">
                                    {{-- render cart items --}}

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="subtotal col-offset-3">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@livewireScripts
@endsection

@section('script')


@endsection

{{--  --}}