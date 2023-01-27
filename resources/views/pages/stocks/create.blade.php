@extends('layouts.app', [
'class' => '',
'elementActive' => 'stocks'
])

@section('content')
@livewireStyles

<div class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Create New Stocks</h5>
                    <p class="card-category">Add stock details to create new stock</p>
                    <hr>
                </div>
                <div class="card-body ">
                    <form action="{{ url('/stocks') }}" method="post">
                        @csrf

                        <div class="row d-flex justify-content-between">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Stock Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Stock Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Quantity</label>
                                    <input type="number" id="quantity" class="form-control" name="quantity"
                                        placeholder="Stock Quantity">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="supplier">Supplier</label>
                                    <select name="supplier" id="supplier" class="form-control">
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="buying_price">Buying Price</label>
                                    <input type="number" id="buying_price" class="form-control" name="buying_price"
                                        placeholder="Buying Price">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="marked_price">Marked Price</label>
                                    <input type="number" id="marked_price" class="form-control" name="marked_price"
                                        placeholder="Marked Price">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row justify-content-center">
                            <hr>
                            <div class="stats col-md-6">
                                <button type="submit" class="btn btn-md btn-primary">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts
@endsection
