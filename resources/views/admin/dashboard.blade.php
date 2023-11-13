@extends('layout.admin')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="ti-car"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Mobil</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>Total : {{ $mobils }}</h2>
                            <span></span>
                        </div>
                    </div>
                    <canvas id="coin_sales1" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="ti-email"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Message</h4>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>Total : {{ $messages }}</h2>
                            <span></span>
                        </div>
                    </div>
                    <canvas id="coin_sales2" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- sales report area end -->
</div>
@endsection