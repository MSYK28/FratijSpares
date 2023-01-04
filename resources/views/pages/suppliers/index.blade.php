@extends('layouts.app', [
'class' => '',
'elementActive' => 'suppliers'
])

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Suppliers</h5>
                    <p class="card-category">List of suppliers for Fratij</p>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Account Info</th>
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
                                        {{ $supplier->info }}
                                    </td>
                                    <td>
                                        {{-- <a href="{{ url('suppliers/' . $supplier->id) }}" class="btn btn-sm
                                        btn-info">Info</a> --}}
                                        <a href="{{ url('suppliers/' . $supplier->id . '/edit') }}"
                                            class="btn btn-sm btn-success ml-3 mr-3"><i class="fa-light fa-pen"></i></a>
                                        {{-- <form action="{{ url('suppliers/'.$supplier->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form> --}}
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
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Supplier Name">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="number">Number</label>
                                    <input type="tel" id="number" class="form-control" name="number"
                                        placeholder="Supplier Number">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="info">Account Info</label>
                                    <input type="number" id="info" class="form-control" name="info"
                                        placeholder="Supplier Info">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <button type="submit" class="btn btn-md btn-primary">Create Account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
