<?php

session_start();

if (isset($_POST["hidden"]) && $_POST["hidden"] == "hidden") {
    $user = trim($_POST["username"]);
    $pwd = md5(trim($_POST["userpwd"]));
    
    $code = $_POST["code"];

    if ($user == "" || trim($_POST["userpwd"]) == "" ||$code == "") {
        echo '<script>alert("请确认信息的完整性！");history.go(-1);</script>';
    } else if ($code != $_SESSION['ver_code']) {
        echo '<script>alert("验证码不对！");history.go(-1);</script>';
    } else {
            $conn = mysqli_connect("123.207.140.186", "root", "", "myDB");
            if (mysqli_errno($conn)) {
                echo mysqli_errno($conn);
            }
            mysqli_set_charset($conn, "utf8");
            $sql = "select username,userpwd from user where username='$user'";
            
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
           
            if (!$num) {
                echo '<script>alert("用户未注册！");history.go(-1);</script>';
            } else {
                    $row =mysqli_fetch_array($result);
                    if($row['username']==$user&&$row['userpwd']==$pwd){
                        //ob_start(); //打开缓冲区 
                        //$_SESSION['token']=md5("12345".$user.$pwd."54321");
                        //设置失效时间为0 表示关闭浏览器之后自动失效 如果保存一小时的话设置time()+3600
                        setcookie("user",$user,0);
                        setcookie("token",md5("cookie_key".$code.$user.$pwd),0);
                        //echo $_SESSION['token'];    
                        header("location:index.php");
                        //ob_end_flush();//输出全部内容到浏览器 
                        
                    }else{
                        echo '<script>alert("验证失败！");history.go(-1);</script>';
                    }
            }
        
    }
}
?>


