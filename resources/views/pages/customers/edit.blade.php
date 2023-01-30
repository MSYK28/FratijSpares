@extends('layouts.app', [
'class' => '',
'elementActive' => 'customers'
])

@section('content')
@livewireStyles

<div class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Update Customer Details</h5>
                    <p class="card-category">Update customer details based on changing values</p>
                    <hr>
                </div>
                <div class="card-body ">
                    <form action="{{ url('/customers') }}" method="post">
                        @csrf

                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="name">Customer Name</label>
                                    <input type="text" id="name" class="form-control" required name="name"
                                        value="{{ $customers->name }}" placeholder="Customer Name">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="number">Number</label>
                                    <input type="tel" id="number" class="form-control" required name="number"
                                        value="{{ $customers->number }}" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <button type="submit" class="btn btn-md btn-primary">Update Account</button>
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
