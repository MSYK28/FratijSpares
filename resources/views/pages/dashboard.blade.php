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
                                <p class="card-category">Items Sold</p>
                                <p class="card-title">
                                    {{ $data['Count'] }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update Now
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-money-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Revenue</p>
                                <p class="card-title">
                                    {{ $data['Total Amount'] }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i> Last day
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-vector text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Profit</p>
                                <p class="card-title">
                                    {{ $data['Profit'] }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-favourite-28 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Owed</p>
                                <p class="card-title">
                                    {{ $data['Debt Amount'] }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        <a href="{{ route('customers.index') }}">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sale-section">
        @include('pages.nav-slider')

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="row my-3">
                    <div class="col-md-12">
                        @include('pages.alert')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Sales Today</h5>
                                <p class="card-category">Sales made on <span class="text-black-700">{{ $data['Date'] }}</span>
                                </p>
                            </div>
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="order-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Profit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="orders">
                                            @foreach ($order_details as $detail)
                                            <tr>
                                                <td>
                                                    {{ $detail->name }}
                                                </td>
                                                <td>
                                                    {{ $detail->quantity }}
                                                </td>
                                                <td>
                                                    {{ ($detail->price) }}
                                                </td>
                                                <td>
                                                    {{ ($detail->quantity) * ($detail->price) }}
                                                </td>
                                                <td>
                                                    {{ ((($detail->price) - ($detail->buying)) * ($detail->quantity)) - ($detail->discount) }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="row my-3">
                    <div class="col-md-12">
                        @include('pages.alert')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Credit Sales Today</h5>
                                <p class="card-category">Sales made on <span class="text-black-700">{{ $data['Date'] }}</span>
                                </p>
                            </div>
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="credit-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                {{-- <th>Profit</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="orders">
                                            @foreach ($debt_details as $detail)
                                            <tr>
                                                <td>
                                                    {{ $detail->name }}
                                                </td>
                                                <td>
                                                    {{ $detail->quantity }}
                                                </td>
                                                <td>
                                                    {{ ($detail->price) }}
                                                </td>
                                                <td>
                                                    {{ ($detail->quantity) * ($detail->price) }}
                                                </td>
                                                {{-- <td>
                                                    {{ ((($detail->price) - ($detail->buying)) * ($detail->quantity)) - ($detail->discount) }}
                                                </td> --}}
                                                <td></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Email Statistics</h5>
                    <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-body ">
                    <canvas id="chartEmail"></canvas>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-primary"></i> Opened
                        <i class="fa fa-circle text-warning"></i> Read
                        <i class="fa fa-circle text-danger"></i> Deleted
                        <i class="fa fa-circle text-gray"></i> Unopened
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar"></i> Number of emails sent
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">NASDAQ: AAPL</h5>
                    <p class="card-category">Line Chart with Points</p>
                </div>
                <div class="card-body">
                    <canvas id="speedChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-info"></i> Tesla Model S
                        <i class="fa fa-circle text-warning"></i> BMW 5 Series
                    </div>
                    <hr />
                    <div class="card-stats">
                        <i class="fa fa-check"></i> Data information certified
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });

</script>
@endpush
