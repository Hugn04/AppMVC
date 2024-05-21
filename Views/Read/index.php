<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tale["ten_truyen"]?></title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container .content{
            margin-top: 60px;
            display: flex;
            flex-direction: column;
        }
        .container .content img{
            width: 100%;
        }
        .chapter_popup{
            display: flex;
            z-index: 100;
            padding: 20px;
            position: fixed;
            transform: scale(0);
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            
            transition: transform ease .5s;

        }
        .chapter_popup.active{
            transform: scale(1);
            backdrop-filter: blur(20px);
            
        }
        .btn{
            
            width: 50px;
            height: 40px;
        }
        .btn.close{
            position: absolute;
            right: 20px;
            top :20px;
        }
        
        .chapter{
            background-color: antiquewhite;
            border: 2px solid black;
            display: flex;
            flex-wrap: wrap;
            width: 260px;
            height: 300px;
            overflow: hidden;
            overflow-y: scroll;

        }
        .chapter a, .btnA{
            border-radius: 3px;
            width: 50px;
            height: 30px;
            background-color: aliceblue;
            border: 1px solid black;
            margin: 5px;
            text-align: center;
            line-height: 30px;
            text-decoration: none;
            outline: none;
        }
        .change_chapter{
            display: flex;
            justify-content: space-between;
            padding: 0 30px;
        }
        .header{
            background-color: #333;
            display: flex;
            position: fixed;
            top:0;
            left: 0;
            z-index: 1;
            width: 100%;
            padding: 10px;
            justify-content: space-between;
        }
        .header h2{
            color: white;
        }
    </style>
</head>
<body>
    
    <div class="chapter_popup">
        <button class="btn close">X</button>
        <div class="chapter">
            <?php
                for($i=1;$i<=$numchapter;$i++){
                    echo '<a href="?id_truyen='.$id_truyen.'&chapter='.$i.'">'.$i.'</a>';
                }
            ?>
        </div>
    </div>


    <div class="header">
        <a href="./" class="btnA" style="background:#04AA6D">Home</a>
        <h2><?php echo $tale["ten_truyen"]?></h2>
        <button class="btnA open">Chapter</button>
    </div>     
    <div class="container">
        <div class="content">
            <?php
                foreach($imgs as $item){
                    echo '<img src="'.$item["url_anh"].'" alt="">';
                }
            ?>

        </div>
    </div>
    <div class="change_chapter">
        <?php
            if($chapter > 1){
                echo '<a href="?id_truyen='.$id_truyen.'&chapter='.($chapter - 1).'" class="btnA">Trước</a>';
            }
            if($chapter < $numchapter){
                echo '<a href="?id_truyen='.$id_truyen.'&chapter='.($chapter + 1).'"class="btnA">Sau</a>';
            }else{
                echo "Hết";
            }
        ?>
    </div>
    <script>
        var btnClose =document.querySelector(".chapter_popup .close")
        var btnOpen =document.querySelector(".open")
        var chapterPopup =document.querySelector(".chapter_popup")
        btnClose.onclick =function(){
            chapterPopup.classList.remove("active")
        }
        btnOpen.onclick =function(){
            chapterPopup.classList.add("active")
        }



    </script>
</body>
</html>