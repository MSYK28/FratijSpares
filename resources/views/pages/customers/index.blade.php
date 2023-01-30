@extends('layouts.app', [
'class' => '',
'elementActive' => 'customers'
])

@section('content')
@livewireStyles

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Customers</h5>
                    <p class="card-category">List of customers for Fratij</p>
                    @include('pages.alert')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="customer-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Owed</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        {{ $customer->name }}
                                    </td>
                                    <td>
                                        {{ $customer->number }}
                                    </td>
                                    <td>
                                        {{ ($customer->subtotal) -($customer->paid) }}
                                    </td>
                                    <td>
                                        <a href="{{ url('customers/' . $customer->id) }}" class="btn btn-sm
                                        btn-info">Info</a>
                                        <a href="{{ url('customers/' . $customer->id . '/edit') }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        
                                        <form action="{{ url('customers/'.$customer->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Create Customer Profile</h5>
                    <p class="card-category">Add customer details to create a profile</p>
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
                                        placeholder="Customer Name">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="number">Number</label>
                                    <input type="tel" id="number" class="form-control" required name="number"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
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
