@extends('layouts.app', [
'class' => '',
'elementActive' => 'stocks'
])

@section('content')
@livewireStyles

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <div class="buttons float-right">
                        <a href="{{ url('stocks/create') }}" class="btn btn-md btn-primary">Create Stock</a>
                    </div>
                    <h5 class="card-title">Stocks</h5>
                    <p class="card-category">List of stocks</p>
                    {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif --}}
                    @include('pages.alert')
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Supplier</th>
                                    <th>Buying</th>
                                    <th>Marked</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                <tr>
                                    <td>
                                        {{ $stock->name }}
                                    </td>
                                    <td>
                                        {{ $stock->quantity }}
                                    </td>
                                    <td>
                                        {{ $stock->supplier }}
                                    </td>
                                    <td>
                                        {{ $stock->buying_price }}
                                    </td>
                                    <td>
                                        {{ $stock->marked_price }}
                                    </td>
                                    <td>
                                        {{-- <a href="{{ url('stocks/' . $supplier->id) }}" class="btn btn-sm
                                        btn-info">Info</a> --}}
                                        <a href="{{ url('stocks/' . $stock->id . '/edit') }}"
                                            class="btn btn-sm btn-success ml-3 mr-3">
                                            <i class="fi fi-ts-attribution pen"></i>
                                        </a>
                                        {{-- <form action="{{ url('stocks/'.$supplier->id) }}" method="post">
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
    </div>
</div>
@livewireScripts
@endsection
