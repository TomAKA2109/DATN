@extends('index.index') {{-- hoặc layout bạn đang dùng --}}

@section('header')
	@include('page.header')
    @include('page.mainmenu')
@endsection

@section('content')
<div class="container-fluid px-5">
    <div class="row gutters">
        <!-- Sidebar -->
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100 mb-4" style="max-width: 100%;">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Avatar">
                            </div>
                            <h5 class="user-name">{{ $khachhang->ten ?? 'Khách hàng' }}</h5>
                            <h6 class="user-email">{{ $khachhang->mail ?? 'Email' }}</h6>
                        </div>
                        <div class="about">
                            <h5>Giới thiệu</h5>
                            <p>Tôi là {{ $khachhang->ten ?? '...' }}. Tôi yêu thích việc tạo ra các trải nghiệm người dùng tuyệt vời.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form -->
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100 mb-4" style="max-width: 100%;">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('capnhatthongtin') }}" method="POST">
                        @csrf

                        <div class="row gutters">
                            <div class="col-xl-12">
                                <h6 class="mb-2 text-primary">Thông Tin Cá Nhân</h6>
                            </div>

                            <div class="col-md-6 col-sm-12">

                                <div class="form-group">
                                    <label for="fullName">Họ tên</label>
                                    <input type="text" class="form-control" id="fullName" name="ten" value="{{ $khachhang->ten ?? '' }}" placeholder="Nhập họ tên">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ $khachhang->username ?? '' }}" placeholder="Tên đăng nhập">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="sdt" value="{{ $khachhang->sdt ?? '' }}" placeholder="Số điện thoại">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="mail">Email</label>
                                    <input type="email" class="form-control" id="mail" name="mail" value="{{ $khachhang->mail ?? '' }}" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="password">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Đổi mật khẩu (nếu muốn)">
                                </div>
                            </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu mới">
                                    </div>
                                </div>

                        
                            <div class="col-xl-12">
                                <h6 class="mt-3 mb-2 text-primary">Địa chỉ</h6>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label for="diachi">Địa chỉ</label>
                                    <input type="text" class="form-control" id="diachi" name="diachi" value="{{ $khachhang->diachi ?? '' }}" placeholder="Nhập địa chỉ">
                                </div>
                            </div>

                        <div class="col-xl-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>

                        <input type="hidden" name="id" value="{{ $khachhang->id ?? '' }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        margin: 0;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }
    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }
    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }
    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        border-radius: 100px;
    }
    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }
    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }
    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }
    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }
    .account-settings .about p {
        font-size: 0.825rem;
    }
    .form-control {
        border: 1px solid #cfd1d8;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }
    .card {
        background: #ffffff;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('footer')
	@include('page.footer')
@endsection
