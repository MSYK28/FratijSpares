@extends('layouts.app', [
'class' => '',
'elementActive' => 'suppliers'
])

@section('content')
@livewireStyles

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Suppliers</h5>
                    <p class="card-category">List of suppliers for Fratij</p>
                    @include('pages.alert')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="supplier-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Account</th>
                                    <th>Account Number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>
                                        {{ $supplier->name }}
                                    </td>
                                    <td>
                                        {{ $supplier->number }}
                                    </td>
                                    <td>
                                        {{ $supplier->bank }}
                                    </td>
                                    <td>
                                        {{ $supplier->account_number }}
                                    </td>
                                    <td>
                                        <a href="{{ url('suppliers/' . $supplier->id) }}" class="btn btn-sm
                                        btn-info">Info</a>
                                        {{-- <div class="flex items-center justify-center w-screen h-screen">
                                            <button onclick="this.Livewire.emit('openModal', 'supplier-edit-modal')"
                                                    class="px-3 py-2 text-sm border border-gray-200 rounded-md">Open Modal</button>
                                        </div> --}}
                                        <a href="{{ url('suppliers/' . $supplier->id . '/edit') }}"
                                            class="btn btn-sm btn-success">Edit</a>

                                        <form action="{{ url('suppliers/'.$supplier->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Del</button>
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
                    <h5 class="card-title">Create Supplier Profile</h5>
                    <p class="card-category">Add supplier details to create a profile</p>
                    <hr>
                </div>
                <div class="card-body ">
                    <form action="{{ url('/suppliers') }}" method="post">
                        @csrf

                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="name">Supplier Name</label>
                                    <input type="text" id="name" class="form-control" required name="name"
                                        placeholder="Supplier Name">
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
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="bank">Bank</label>
                                    <input type="text" id="bank" class="form-control" required name="bank"
                                        placeholder="Bank">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="account_number">Account Number</label>
                                    <input type="text" id="account_number" class="form-control" required name="account_number"
                                        placeholder="Account Number">
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
