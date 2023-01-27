<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('FRATIJ SPARES') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'suppliers' ? 'active' : '' }}">
                <a href="{{ url('suppliers') }}">
                    <i class="nc-icon nc-box-2"></i>
                    <p>{{ __('Suppliers') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'orders' ? 'active' : '' }}">
                <a href="{{ url('orders') }}">
                    <i class="nc-icon nc-basket"></i>
                    <p>{{ __('Orders') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'stocks' ? 'active' : '' }}">
                <a href="{{ url('stocks') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Stocks') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'customers' ? 'active' : '' }}">
                <a href="{{ url('customers') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __('Customers') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            Users
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ url('user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ url('icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
           
        </ul>
    </div>
</div>
