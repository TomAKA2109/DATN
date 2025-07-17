@extends('admin.admin')

@section('content')
    Ok
@endsection

@section('table')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h3 class="mt-4">Dashboard</h3>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Tổng số khách hàng</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white stretched-link" href="#">{{ $customerStat }}</span>
                                <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                        </path>
                                    </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Tổng doanh thu trong tháng</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <span class="small text-white stretched-link" href="#">{{ $totalAmount }}</span>
                                <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                        </path>
                                    </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Tổng số lượng sách</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">{{ $bookStat }}</a>
                                <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                        </path>
                                    </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Số lượng danh mục</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">{{ $categoryStat }}</a>
                                <div class="small text-white"><svg class="svg-inline--fa fa-angle-right" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M246.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 41.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                        </path>
                                    </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
