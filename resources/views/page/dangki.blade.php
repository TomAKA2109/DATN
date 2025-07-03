<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<title>Đăng kí</title>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style>
			.form-signin
		{
		    max-width: 330px;
		    padding: 15px;
		    margin: 0 auto;
		}
		.form-signin .form-signin-heading, .form-signin .checkbox
		{
		    margin-bottom: 10px;
		}
		.form-signin .checkbox
		{
		    font-weight: normal;
		}
		.form-signin .form-control
		{
		    position: relative;
		    font-size: 16px;
		    height: auto;
		    padding: 10px;
		    -webkit-box-sizing: border-box;
		    -moz-box-sizing: border-box;
		    box-sizing: border-box;
		}
		.form-signin .form-control:focus
		{
		    z-index: 2;
		}
		.form-signin input[type="text"]
		{
		    margin-bottom: -1px;
		    border-bottom-left-radius: 0;
		    border-bottom-right-radius: 0;
		}
		.form-signin input[type="password"]
		{
		    margin-bottom: 10px;
		    border-top-left-radius: 0;
		    border-top-right-radius: 0;
		}
		.account-wall
		{
		    margin-top: 20px;
		    padding: 40px 0px 20px 0px;
		    background-color: #f7f7f7;
		    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}
		.login-title
		{
		    color: #555;
		    font-size: 18px;
		    font-weight: 400;
		    display: block;
		}
		.profile-img
		{
		    width: 96px;
		    height: 96px;
		    margin: 0 auto 10px;
		    display: block;
		    -moz-border-radius: 50%;
		    -webkit-border-radius: 50%;
		    border-radius: 50%;
		}
		.need-help
		{
		    margin-top: 10px;
		}
		.new-account
		{
		    display: block;
		    margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">

    <div class="row" style="margin-top: 100px;">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Đăng kí thành viên</h1>
            <div class="account-wall">
                <img class="profile-img" src="{{ url('/image/Vista_icons_08.png') }}"
                    alt="">
                <form class="form-signin" action="{{ url('dangki') }}" method="post">
                @csrf
                <div class="form-group {{ $errors->has('username') ? 'has-error' : ''  }}">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" class="form-control is-invalid" placeholder="Username" name="username" autofocus value="{{ old('username') }}"/>
                    @error('username')
                        <div class="help-block">
                            {{ $errors->first('username') }}
                        </div>
                    @enderror
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                    <label for="pass">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}"/>
                    @error('password')
                        <div class="help-block">
                            {{ $errors->first('password') }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pass">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Password" name="password_confirmation" />
                </div>

                <div class="form-group {{ $errors->has('mail') ? 'has-error' : ''  }}">
                    <label for="pass">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="mail" value="{{ old('mail') }}"/>
                    @error('mail')
                        <div class="help-block">
                            {{ $errors->first('mail') }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Đăng kí</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me" name="remember_me" checked/>
                    Lưu mật khẩu
                </label>
                <a href="#" class="pull-right need-help">Trợ giúp? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="{{ route('kh_login') }}" class="text-center new-account">Quay trở lại trang đăng nhập </a>
        </div>
    </div>
</div>
</body>
</html>
