@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Capacity</p>
                                <p class="card-title">150GB
                                    <p>
                            </div>
                            <div class="button">
                                <a href="{{ url('/suppliers/create') }}" class="btn btn-sm btn-primary">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection









