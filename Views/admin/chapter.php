<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://hungcoi2x.glitch.me/trangchu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card-body {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .group_button {
            height: 100%;
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            width: 30px;
        }
        .add_popup {
            padding: 0 20px;
            width: 100%;
            height: 100%;
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            transform: scaleY(0);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(0);
            transition: transform ease .3s , backdrop-filter ease .3s ;
        }
        .add_popup.active{
            transform: scaleY(1);
            backdrop-filter: blur(30px);
            
        }
        .add_popup .form{
            position: relative;
            text-align: center;
            width: 400px;
            border: 1px solid black;
            border-radius: 20px;
            padding: 30px;
            overflow: hidden;

        }
        .form-group input{
            width: 100%;
            height: 40px;
            background-color: #f0f0f0;
            margin: 5px 0;
            border-radius: 10px;
            padding: 0 10px;
            border: none;
            outline: none;
        }
        .form-group input[type="file"]::-webkit-file-upload-button{
            visibility: hidden;
        }
        .form-group input::before {
            content: 'Chọn ảnh';
            display: inline-block;
            border-radius: 3px;
            padding: 5px 8px;
            outline: none;
            cursor: pointer;
            width: 10%;
            height: 100%;
        }
        .btn_close{
            position: absolute;
            right: 0;
            top: 0;
            font-size: 20px;
            width: 50px;
            height: 50px;
            border-radius:  0px 0px 0px 20px;
            border: none;
        }
        input[type="submit"]{
            margin-top: 5px;
            width: 100px;
            height: 40px;
            border: none;
            border-radius: 20px;
        }
        @media screen and (max-width: 800px) {
            .container{
                padding-top: 60px;
                
                
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav_container">
            <div class="nav_logo"><a href="../" >Hugn</a></div>
            <div class="nav_menu">
                <a href="../admin">Back</a>
                <a href="">Admin</a>
            </div>
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
                    $count = count($chapters);
                    $index = 0;
                    foreach($chapters as $item){
                        $index++;
                        if ($index != $count) { 

                            echo '<div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>'.$item["ten_chapter"].'</h3>
                                        <div class="group_button">
                                            <a href="editchapter?id_truyen='.$id.'&chapter='.$item["so_chapter"].'" class="btn_edit"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }else{
                            echo '<div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>'.$item["ten_chapter"].'</h3>
                                        <div class="group_button">
                                            <a href="editchapter?id_truyen='.$id.'&chapter='.$item["so_chapter"].'" class="btn_edit"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                            <div class="delete" action="delete"><i class="fa-solid fa-xl fa-trash-can"
                                                    style="color: #ff0040;"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                
                ?>
                <!-- <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Chapter 1</h3>
                            <div class="group_button">
                                <a href="" class="btn_edit"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                <a href=""  class="delete"><i class="fa-solid fa-xl fa-trash-can"
                                        style="color: #ff0040;"></i></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                
                <div class="col-sm-6 new" action="new">
                    <div class="card">
                        <div class="card-body">
                            <h3>Thêm Chapter</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add_popup">
            <div class="form">
                <form action="" method="POST">
                    <h2>Thêm Truyện</h2>
                    <div class="form-group">
                        <input type="text" id="fname" name="name" placeholder="Tên truyện">
                    </div>
                    <div class="form-group">
                        <input type="file" id="fname" name="file" placeholder="Chọn ảnh nền">
                    </div>
                    <input type="submit" value="Thêm">
                </form>
                <button class="btn_close">X</button>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var btnNew =document.querySelector(".new")
        function change(element){
            element.onclick = function(){
                $.ajax({
                    url:"",
                    method:"POST",
                    data:{
                        action:element.getAttribute("action"),
                      
                    }
                }).then(()=>{
                    location.reload()
                })
            }
        }
        
        change(btnNew)
        var btnDelete = document.querySelector(".delete")
        if(btnDelete){
            change(btnDelete)
        }
        


    </script>
</body>

</html>