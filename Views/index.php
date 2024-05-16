<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .topnav {
            background-color: #333;
            overflow: hidden;
            position: fixed;
            width: 100%;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav .icon {
            display: none;
        }


        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
        }


        @media screen and (max-width: 600px) {
            .topnav.responsive {position: fixed;}
            .topnav.responsive a.icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }




        body {
            font-family: Arial, Helvetica, sans-serif;

        }

        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        .row {
            margin: 0 -5px;
            padding-top: 70px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        
        .card {
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
            height: 100px;
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body></body>

    <div class="topnav" id="myTopnav">
        <a href="#home" class="active">Home</a>
        <a href="./admin">Admin</a>
        <a href="logout">Đăng xuất</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="row">
        <?php
        //$list_tale = $DB->select("SELECT * FROM `title_tale`");
        foreach($list_tale as $item){
            echo '<a href="Read?id='.$item["id"].'&chapter=1">
                <div class="column">
                    <div style="background: url('.$item["imgURL"].'); background-size: cover; background-repeat: no-repeat;" class="card">
                        <h2 class="title">'.$item["name"].'</h3>
                    </div>
                </div>
            </a>';
        }
        ?>
        
      </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
        <?php 
            
            if(isset($_SESSION["err"])){
                echo "alert('".$_SESSION["err"]."')";
                unset($_SESSION["err"]);

            }
        ?>
    </script>
</body>
</html>