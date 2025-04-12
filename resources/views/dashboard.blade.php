@extends('layouts.header&footer')

@section('meta-data')
<title>Admin Dashboard EasyDoings</title>
@endsection

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="fs-2 fw-semibold" data-coreui-i18n="Dashboard">Dashboard</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#" data-coreui-i18n="Home">Home</a>
                </li>
                <li class="breadcrumb-item active"><span data-coreui-i18n="Dashboard">Dashboard</span>
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-4">
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <h6 class="card-title text-body-secondary text-truncate" data-coreui-i18n="customers">Customers</h6>
                                    <div class="bg-primary bg-opacity-25 text-primary p-2 rounded ms-2">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="fs-4 fw-semibold pb-3">44.725</div>
                                <small class="text-danger">
                                    (-12.4%
                                    <svg class="icon">
                                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                    </svg>
                                    )
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <h6 class="card-title text-body-secondary text-truncate" data-coreui-i18n="orders">Orders</h6>
                                    <div class="bg-primary bg-opacity-25 text-primary p-2 rounded ms-2">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="fs-4 fw-semibold pb-3">385</div>
                                <small class="text-success">
                                    (17.2%
                                    <svg class="icon">
                                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                    </svg>
                                    )
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 text-white bg-primary-gradient">
                            <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">
                                        26K 
                                        <span class="fs-6 fw-normal">
                                            (-12.4%
                                            <svg class="icon">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                            </svg>
                                            )
                                        </span>
                                    </div>
                                    <div data-coreui-i18n="users">Users</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                                </div>
                            </div>
                            <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                                <canvas class="chart" id="card-chart1" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 text-white bg-warning-gradient">
                            <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">
                                        2.49% 
                                        <span class="fs-6 fw-normal">
                                            (84.7%
                                            <svg class="icon">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                            </svg>
                                            )
                                        </span>
                                    </div>
                                    <div data-coreui-i18n="conversionRate">Conversion Rate</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                                </div>
                            </div>
                            <div class="chart-wrapper mt-3" style="height:80px;">
                                <canvas class="chart" id="card-chart3" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 text-white bg-danger-gradient">
                            <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">
                                        44K 
                                        <span class="fs-6 fw-normal">
                                            (-23.6%
                                            <svg class="icon">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                            </svg>
                                            )
                                        </span>
                                    </div>
                                    <div data-coreui-i18n="sessions">Sessions</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                                </div>
                            </div>
                            <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                                <canvas class="chart" id="card-chart4" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection