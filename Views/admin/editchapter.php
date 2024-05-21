<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sửa Chapter</title>
    <link rel="stylesheet" href="https://hungcoi2x.glitch.me/trangchu.css">
    <style>
        @media screen and (max-width: 800px) {
            .container{
                padding-top: 60px;
                
                
            }
        }
        *{
            padding: 0;

        }
        .list_img{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .img{
            position: relative;
        }
        .list_img img{
            width: 140px;
            margin: 5px 5px;
            border-radius: 20px;
            margin-bottom: 5px;
            border: 3px solid black;
            height: 300px;
        }
        .del_img{
            position: absolute;
            top: 12px;
            right: 12px;
        }
        #form fieldset input{
            width: 250px;
        }
        .wraper{
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 99;
            backdrop-filter: blur(300px);
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
            <div class="nav_logo"><a href="../" >Hugn</a></div>
            <div class="nav_menu">
                <a href="./chapter?id_truyen=<?php echo $id_truyen?>">Back</a>
                <a href="">Admin</a>
            </div>
        </div>
        <div class="account">
            <div class="info">
                <?php
                    echo '<div class="info">
                    <h5 class="name">'.User::get("name").'</h5>
                    <div class="dropdown">
                        <img id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" src="'.User::get("img").'" alt="">
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="logout">Đăng Xuất</a></li>
                        </ul>
                    </div>
                    
                </div>';
                ?>
            </div>
        </div>

    </nav>
    <div class="container">
        <div class="wraper">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div style="margin-left: 10px;">Đang tải ....</div>
        </div>
        <div class="content">
            <div class="list_img" id="sortable-list">
                <?php
                    foreach($anhs as $item){
                        echo '<div class="img">
                                <img src="'.$item["url_anh"].'" alt="">
                                <div class="del_img"><i class="btn_del fa-solid fa-xmark fa-xl "></i></div>
                            </div>';
                    }
                
                
                ?>
                <!-- <div class="img">
                    <img src="http://res.cloudinary.com/dfrk1gorf/image/upload/v1715002330/plydtzr37o1rjrzddj5q.jpg" alt="">
                    <div class="del_img"><i class="btn_del fa-solid fa-xmark fa-xl "></i></div>
                </div> -->
                
                
            </div>
            <form id="form" action="" method="post" enctype="multipart/form-data">
                <label for="lname">Thêm ảnh</label><br>
                <fieldset>
                <input id="input_files" type="file" name="files[]" multiple="multiple"/>
                </fieldset>
                <input type="submit" name="upload" value="Upload" disabled/>
            </form>
            <br>
            <button class="save">Lưu thứ tự ảnh</button>
        </div>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        document.querySelector("#form input[type='submit']").onclick =function(){
            $(".wraper").toggleClass("active")
        }
        var input_files =document.querySelector("#input_files")
        input_files.onchange =function(){
            
            if(this.files.length > 0){
                document.querySelector("#form input[type='submit']").removeAttribute("disabled");
            }else{
                document.querySelector("#form input[type='submit']").setAttribute("disabled", "");
            }
            
        }
        

        document.querySelector(".save").onclick =function(){
            $(".wraper").toggleClass("active")
            var imgs =document.querySelectorAll(".img img")
            anhs = []
            imgs.forEach(function(element){
                anhs.push({"url_anh":element.currentSrc})
            })
            $.ajax({
                url:"sortImg",
                method:"POST",
                data:{
                    url_anh:anhs,
                }
            }).then(()=>{
                location.reload()
            })
        }


        var sortable = new Sortable(document.getElementById('sortable-list'), {
            animation: 150,
            ghostClass: 'sortable-ghost',
        });
        
        function getID(url){
            temp =  url.split("/")
            id = temp[temp.length-1].split(".")[0]
            

            return id
        }
        var container =document.querySelector(".list_img")
        container.onclick =function(e){
            var target = e.target
            if(target.classList[0]=="btn_del"){
                link = target.parentElement.parentElement.querySelector("img").getAttribute("src")
                $(".wraper").toggleClass("active")
                $.ajax({
                    method:"POST",
                    url:"delete",
                    data:{
                        id:getID(link),
                        imgURL:link,
                        id_truyen:<?php echo $id_truyen?> ,
                        chapter:<?php echo $chapter?> ,
                    }
                }).then(()=>{
                    location.reload()
                })
            }
        }


    </script>
</body>

</html>