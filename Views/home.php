<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hugn</title>
	<link rel="stylesheet" href="https://hungcoi2x.glitch.me/trangchu.css">
	<style>
		a{
			text-decoration: none;
		}
	</style>
</head>

<body>
	<nav>
		<div class="nav_container">
			<div class="nav_logo">Hugn</div>
			<div class="nav_menu">
				<?php
					if(User::get("role") == "admin"){
						echo '<a href="admin">Admin</a>';
					}
				
				?>
			</div>
		</div>
		<div class="nav_searchbar">
			<form action="trangchu">
				<input type="text" name="name">
				<button>Tìm</button>
			</form>
		</div>
		<div class="account">
			<?php
				if(User::isLogin()){
					echo '<div class="info">
							<h5 class="name">'.User::get("name").'</h5>
							<div class="dropdown">
								<img id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" src="'.User::get("img").'" alt="">
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="logout">Đăng Xuất</a></li>
								</ul>
							</div>
							
						</div>';
				}
				else{
					echo '<a class="btn_login" href="./login">Login</a>';
				}
			?>
			
			
		</div>
		
	</nav>
	<div class="container">
		<div class="content">
			
			<div class="row">
				<?php
					foreach($tales as $item){
						echo '<div class="col-sm-6">
								<a href="./read?id_truyen='.$item["id"].'&chapter=1">
									<div class="card" style="background: url('.$item["anh_nen"].'); background-size: cover; background-repeat: no-repeat;">
										<div class="card-body" >
											<h3>'.$item["ten_truyen"].'</h3>
										</div>
									</div>
								</a>
							</div>';
					}
				
				?>
				
				<!-- <div class="col-sm-6">
					<div class="card">
						<a href="">
							<div class="card-body">
								<h3>Title</h3>
							</div>
						</a>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>

</html>