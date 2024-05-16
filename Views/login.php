<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-size: cover;
            background-position-y: -80px;
            font-size: 16px;
        }
        #wrapper{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #form-login{
            max-width: 400px;
            background: rgba(0, 0, 0 , 0.8);
            flex-grow: 1;
            padding: 30px 30px 40px;
            box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
        }
        .form-heading{
            font-size: 25px;
            color: #f5f5f5;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group{
            border-bottom: 1px solid #fff;
            margin-top: 15px;
            margin-bottom: 20px;
            display: flex;
        }
        .form-group i{
            color: #fff;
            font-size: 14px;
            padding-top: 5px;
            padding-right: 10px;
        }
        .form-input{
            background: transparent;
            border: 0;
            outline: 0;
            color: #f5f5f5;
            flex-grow: 1;
        }
        .form-input::placeholder{
            color: #f5f5f5;
        }
        #eye i{
            padding-right: 0;
            cursor: pointer;
        }
        
        .form-submit{
            background: transparent;
            border: 1px solid #f5f5f5;
            color: #fff;
            width: 100%;
            text-transform: uppercase;
            padding: 6px 10px;
            transition: 0.25s ease-in-out;
            margin-top: 30px;
        }
        .form-submit:hover{
            border: 1px solid #54a0ff;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <form action="" method="post" id="form-login">
            <?php
                if(isset($err)){
                    echo $err;
                }
            ?>
            <h1 class="form-heading">Đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="user" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="password" placeholder="Mật khẩu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
    <script>
        <?php
            if(isset($_SESSION["err"])){
                echo "alert('".$_SESSION["err"]."')";
                unset($_SESSION["err"]);
            }
        ?>
    </script>
</body>
</html>