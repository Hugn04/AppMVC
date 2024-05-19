<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://hungcoi2x.glitch.me/trangchu.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<nav>
		<div class="nav_container">
			<div class="nav_logo">Hugn</div>
			<div class="nav_menu">
				<a href="">Home</a>
				<a href="admin">Admin</a>
			</div>
		</div>
		<div class="nav_searchbar">
			<form action="trangchu">
				<input type="text" name="name">
				<button>Tìm</button>
			</form>
		</div>
		<div class="account">
			<div class="info">
				<h5 class="name"><?php echo User::get("name")?></h5>
				<img src="<?php echo User::get("img")?>" alt="">
			</div>
			<!-- <a class="btn_login" href="">Login</a> -->
		</div>
		
	</nav>
	<div class="container">
		<div class="content">
			
			<div class="row">
				<?php
					foreach($tales as $item){
						echo '<div class="col-sm-6">
								<div class="card" style="background: url('.$item["anh_nen"].'); background-size: cover; background-repeat: no-repeat;">
									<a href="./read?id_truyen='.$item["id"].'&chapter=1">
										<div class="card-body" >
											<h3>'.$item["ten_truyen"].'</h3>
										</div>
									</a>
								</div>
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
</body>

</html>