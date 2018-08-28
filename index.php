<?php 
   // session_start() 
?> 
<!DOCTYPE html>
<!--

如果使用基于cookie的session(cookie-based sessions),那么在使用Session_start()之前浏览器不能有任何输出，
否则会出现"Cannot send session cache limiter – headers already sent"错误,
所以首先要确保Session_start()在开始输出之前执行,一般直接放到php文件的最上方.


-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        if(!isset($_COOKIE["user"]))
            {
            //header("location:login.php");
               echo '<script type="text/javascript">
                window.location.href="login.php"          
                </script>';
        }else{
            echo "欢迎登陆!!!<br>".$_COOKIE["user"];
        }
        ?>
    </body>
</html>
