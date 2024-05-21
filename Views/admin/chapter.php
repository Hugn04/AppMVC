<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sửa Truyện</title>
    <link rel="stylesheet" href="https://hungcoi2x.glitch.me/trangchu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            transition: transform ease .3s, backdrop-filter ease .3s;
        }

        .add_popup.active {
            transform: scaleY(1);
            backdrop-filter: blur(30px);

        }

        .add_popup .form {
            position: relative;
            text-align: center;
            width: 400px;
            border: 1px solid black;
            border-radius: 20px;
            padding: 30px;
            overflow: hidden;

        }

        .form-group input {
            width: 100%;
            height: 40px;
            background-color: #f0f0f0;
            margin: 5px 0;
            border-radius: 10px;
            padding: 0 10px;
            border: none;
            outline: none;
        }

        .form-group input[type="file"]::-webkit-file-upload-button {
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

        .btn_close {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 20px;
            width: 50px;
            height: 50px;
            border-radius: 0px 0px 0px 20px;
            border: none;
        }

        input[type="submit"] {
            margin-top: 5px;
            width: 100px;
            height: 40px;
            border: none;
            border-radius: 20px;
        }

        @media screen and (max-width: 800px) {
            .container {
                padding-top: 60px;


            }
        }
        .wraper{
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 99;
            backdrop-filter: blur(20px);
            display: none;
            justify-content: center;
            align-items: center;
            
            
        }
        .wraper.active{
            display: flex;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav_container">
            <div class="nav_logo"><a href="../">Hugn</a></div>
            <div class="nav_menu">
                <a href="../admin">Back</a>
                <a href="">Admin</a>
            </div>
        </div>
        <div class="account">
            <?php
                echo '<div class="info">
                <h5 class="name">'.User::get("name").'</h5>
                <div class="dropdown">
                    <img id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" src="'.User::get("img").'" alt="">
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../logout">Đăng Xuất</a></li>
                    </ul>
                </div>
                
            </div>';
            ?>
        </div>

    </nav>
    <div class="container">
        <div class="wraper">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div style="margin-left: 10px;">Đang tải....</div>
        </div>
        <div class="content">
            <div class="row">
                <?php
                $count = count($chapters);
                $index = 0;
                foreach ($chapters as $item) {
                    $index++;
                    if ($index != $count) {

                        echo '<div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>' . $item["ten_chapter"] . '</h3>
                                        <div class="group_button">
                                            <a href="editchapter?id_truyen=' . $id . '&chapter=' . $item["so_chapter"] . '" class="btn_edit"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    } else {
                        echo '<div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>' . $item["ten_chapter"] . '</h3>
                                        <div class="group_button">
                                            <a href="editchapter?id_truyen=' . $id . '&chapter=' . $item["so_chapter"] . '" class="btn_edit"><i class="fa-solid fa-xl fa-pen-to-square"></i></a>
                                            <div class="delete" ><i data-bs-toggle="modal" data-bs-target="#delete_chapter" class="fa-solid fa-xl fa-trash-can"
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

    <!-- Modal -->
    <div class="modal fade" id="delete_chapter" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cảnh báo !</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa chapter này không ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="dimiss_model" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" id="accecpt_delete" class="btn btn-primary">Chấp nhận</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        
        var btnNew = document.querySelector(".new")
        btnNew.onclick = function() {
            $(".wraper").toggleClass("active")
            $.ajax({
                url: "",
                method: "POST",
                data: {}
            }).then(() => {
                location.reload()
            })
        }
        var btnDelete = document.querySelector("#accecpt_delete")
        if (btnDelete) {
            btnDelete.onclick = function() {
                $("#dimiss_model").click()
                $(".wraper").toggleClass("active")
                $.ajax({
                    url: "",
                    method: "DELETE",
                    data: {}
                }).then((data) => {
                    location.reload()
                })
            }
        }
    </script>
</body>

</html>