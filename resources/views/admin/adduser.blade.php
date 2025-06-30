<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add user</title>
	<link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
	<style>
		body {
		    background-size: cover;
		}

		*[role="form"] {
		    max-width: 530px;
		    padding: 15px;
		    margin: 0 auto;
		    border-radius: 0.3em;
		    background-color: #f2f2f2;
		}

		*[role="form"] h2 { 
		    font-family: 'Open Sans', sans-serif;
		    font-size: 40px;
		    font-weight: 600;
		    color: #000000;
		    margin-top: 5%;
		    text-align: center;
		    text-transform: uppercase;
		    letter-spacing: 4px;
		}
	</style>
</head>
<body>
	<div class="container" style="padding-top: 100px;">
		<form class="form-horizontal" role="form" action="{{ route('adminsqlkhachhang1/postusers') }}" method="post">
			@csrf
			<h2>ĐĂNG KÝ MỚI</h2>

			<div class="form-group">
				<label for="txthoten" class="col-sm-3 control-label">Họ tên:</label>
				<div class="col-sm-9">
					<input type="text" id="txthoten" name="txthoten" placeholder="Họ Tên" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label for="txtusername" class="col-sm-3 control-label">Username:</label>
				<div class="col-sm-9">
					<input type="text" id="txtusername" name="txtusername" placeholder="Username" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Password:</label>
				<div class="col-sm-9">
					<input type="password" id="password" name="PassWord" placeholder="Password" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label for="Phonenumber" class="col-sm-3 control-label">Điện thoại:</label>
				<div class="col-sm-9">
					<input type="number" id="Phonenumber" name="Phonenumber" placeholder="Số điện thoại" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label for="txtdiachi" class="col-sm-3 control-label">Địa chỉ:</label>
				<div class="col-sm-9">
					<input type="text" id="txtdiachi" name="txtdiachi" placeholder="Địa chỉ" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email:</label>
				<div class="col-sm-9">
					<input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
		</form>
	</div>
</body>
</html>
