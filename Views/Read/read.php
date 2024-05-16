<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
        // include("../DB.php");
        // include("../config.php");
        // $DB = new DB();
        // $DB->connect();
        // $sql = "SELECT * FROM `tale` WHERE taleID = '1004' and chapter = '1';";
        // if(isset($_GET["tale"]) && isset($_GET["chapter"])){
        //     $sql = "SELECT * FROM `tale` WHERE taleID = '".$_GET["tale"]."' and chapter = '".$_GET["chapter"]."';";
        // }
        // $tale_imgs = $DB->select($sql);
    ?>
    <?php
        // if(isset($_COOKIE["PHPSESSID"])){
        //     session_id($_COOKIE["PHPSESSID"]);
        //     session_start();
        //     if($_SESSION["user"]){
        //         $value = $DB->getUser($_SESSION["user"]);
                
        //     }else{
        //         header("location: ".$url."/login.php");
        //         $_SESSION["err"] = "Trang web này bắt buộc đăng nhập";
        //     }
        // }else{
        //     header("location: ".$url."/login.php");
        //     $_SESSION["err"] = "Trang web này bắt buộc đăng nhập";
        // }
    ?>
    <div class="chapter_popup">
        <button class="btn close">X</button>
        <div class="chapter">
            <?php
                //$tale = $DB->select("SELECT * FROM `title_tale` WHERE id = ".$_GET["tale"].";")[0];
                $numchapter = $tale["numchapter"];
                for($i=1;$i<=$numchapter;$i++){
                    echo '<a href=Read?id='.$id.'&chapter='.$i.'>'.$i.'</a>';
                }
            ?>
        </div>
    </div>


    <div class="header">
        <a href="./" class="btnA" style="background:#04AA6D">Home</a>
        <h2><?php echo $tale["name"]?></h2>
        <button class="btnA open">Chapter</button>
    </div>     
    <div class="container">
        
        <div class="content">
            <?php
                foreach($tale_imgs as $item){
                    echo '<img src="'.$item["imgURL"].'" alt="">';
                }
            ?>

        </div>
    </div>
    <div class="change_chapter">
        <?php
            if($_GET["chapter"] > 1){
                echo '<a href="Read?id='.$id.'&chapter='.($chapter - 1).'" class="btnA">Trước</a>';
            }
            if($_GET["chapter"] < $numchapter){
                echo '<a href="Read?id='.$id.'&chapter='.($chapter + 1).'"class="btnA">Sau</a>';
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