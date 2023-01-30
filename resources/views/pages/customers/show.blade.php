@extends('layouts.app', [
'class' => '',
'elementActive' => 'customers'
])

@section('content')
@livewireStyles

<div class="content">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <a href="/customers" class="btn btn-sm btn-danger float-right">Back</a>
                    <h4>Customer Credit Information</h4>
                    <p class="card-category">Expanded information about {{ $customers->name }}</p>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ml-4">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <h3>{{ $customers->name }}</>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Amount Owed</label>
                                    <h3>{{ ($customers->subtotal) -($customers->paid) }} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customer-info pt-5 ">
                        <h4 class="text-red-500 text-center text-underline">Credit Account</h4>
                        @if ( $customers->owed == '1' )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            <strong>{{ $customers->name }}</strong> has no due amounts
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @foreach ($debts as $debt)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h5>Date: {{ $debt->created_at }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="customer-debt-table" class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Amount</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($debt_details as $debt_detail)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $debt_detail->name }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $debt_detail->quantity }}
                                                                        </td>
                                                                        <td>
                                                                            {{ ($debt_detail->price) }}
                                                                        </td>
                                                                        <td>
                                                                            {{ (($debt_detail->price) * ($debt_detail->quantity)) }}
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h5 class="">Payments Made</h5>
                                        </div>
                                        <div class="card-category">
                                            <p>List of payments to settle credit</p>
                                            <a href="" class="btn-sm btn-primary btn">
                                                Make Payment
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="payment-info col-sm-12">
                                            <div class="row d-flex">
                                                <h6>Date: <strong>12/12/12</strong></h6>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="name">Amount Paid</label>
                                                    <input type="text" id="name" class="form-control" required name="name"
                                                        placeholder="Customer Name" disabled>
                                                    <hr>
                                                    </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="name">Balance</label>
                                                    <input type="text" id="name" class="form-control" required name="name"
                                                        placeholder="Customer Name" disabled>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row d-flex">
                                                <h6>Date: <strong>12/12/12</strong></h6>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="name">Amount Paid</label>
                                                    <input type="text" id="name" class="form-control" required name="name"
                                                        placeholder="Customer Name" disabled>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label" for="name">Balance</label>
                                                    <input type="text" id="name" class="form-control" required name="name"
                                                        placeholder="Customer Name" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts
@endsection
