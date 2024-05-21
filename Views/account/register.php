<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Đăng ký</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://hungcoi2x.glitch.me/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="./"><img src="https://cdn.glitch.global/969d2f02-48c6-492c-bf61-365664d844f6/logo.jpg?v=1716116586154" alt="bootstrap 4 login page"></a>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Đăng ký tài khoản</h4>
							<div style="color: red;">
								<?php if(isset($err)){echo $err;}?>
							</div>
							<form method="POST" action="" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Tên người dùng</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
									<div class="invalid-feedback">
										Vui lòng điền tên của bạn
									</div>
								</div>
								

								<div class="form-group">
									<label for="user">Tên tài khoản</label>
									<input id="email" type="text" class="form-control" name="user" required>
									<div class="invalid-feedback">
										Bắt buộc nhập tên tài khoản
									</div>
								</div>

								<div class="form-group">
									<label for="password">Mật khẩu</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Mật khẩu không được để trống
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">Tôi đồng ý với <a href="#">Điều khoản và Điều kiện</a></label>
										<div class="invalid-feedback">
											Bạn phải đồng ý các điều khoản và điều kiện
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Đăng ký
									</button>
								</div>
								<div class="mt-4 text-center">
									Bạn đã có tài khoản ? <a href="login">Đăng Nhập</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Hugn
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://hungcoi2x.glitch.me/my-login.js"></script>
</body>
</html>	