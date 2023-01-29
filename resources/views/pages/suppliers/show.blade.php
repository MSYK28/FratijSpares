@extends('layouts.app', [
'class' => '',
'elementActive' => 'suppliers'
])

@section('content')
@livewireStyles

<div class="content">

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <a href="/suppliers" class="btn btn-sm btn-danger float-right">Cancel</a>
                    <h4>Update Supplier Details</h4>
                    <p class="card-category">Enter details to update supplier information</p>
                    <hr>
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="{{ url('suppliers/'.$suppliers->id)}}" accept-charset="UTF-8">
                        @csrf
                        @method('PUT')
    
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" 
                                        class="form-control" placeholder="Name"
                                        value="{{$suppliers->name}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="number">Phone Number</label>
                                <input type="tel" name="number" id="number" 
                                        class="form-control" placeholder="number"
                                        value="{{$suppliers->number}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bank">Bank</label>
                                <input type="text" name="bank" id="bank" 
                                        class="form-control" placeholder="bank"
                                        value="{{$suppliers->bank}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="account_number">Account</label>
                                <input type="number" name="account_number" id="account_number" 
                                        class="form-control" placeholder="Account Number"
                                        value="{{$suppliers->account_number}}">
                            </div>
                           
                        </div>
    
                        <div class="row">
                            <div class="form-group col-md-4 col-offset-3">
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection