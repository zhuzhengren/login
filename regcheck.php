<?php

session_start();
if (isset($_POST["hidden"]) && $_POST["hidden"] == "hidden") {
    $user = trim($_POST["username"]);
    $pwd = md5(trim($_POST["userpwd"]));
    $pwd_confirm = md5(trim($_POST["confirm"]));
    $code = $_POST["code"];

    if ($user == "" || trim($_POST["userpwd"]) == "" || trim($_POST["confirm"]) == "" || $code == "") {
        echo '<script>alert("请确认信息的完整性！");history.go(-1);</script>';
    } else if ($code != $_SESSION['ver_code']) {
        echo '<script>alert("验证码不对！");history.go(-1);</script>';
    } else {
        if ($pwd == $pwd_confirm) {
            $conn = mysqli_connect("123.207.140.186", "root", "", "myDB");
            if (mysqli_errno($conn)) {
                echo mysqli_errno($conn);
            }
            mysqli_set_charset($conn, "utf8");
            $sql = "select username from user where username='$user'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num) {
                //防止重复用户
                echo '<script>alert("用户已存在！");history.go(-1);</script>';
            } else {
                //$ip = ip2long($_SERVER["REMOTE_ADDR"]);
                $ip = ip2long("1.168.1.100");
                $time = time();
                //字段不用加引号 values字段需哟加引号的就加引号，例如vchar类型的
                $sql_insert = "INSERT INTO user (username,userpwd,createtime,createip) VALUES ('$user','$pwd',$time,$ip) ";
                $res_insert = mysqli_query($conn, $sql_insert);
                if ($res_insert) {
                    echo '<script>alert("注册成功！");history.go(-1);</script>';
                } else {
                    echo '<script>alert("注册失败！");history.go(-1);</script>';
                }
            }
        } else {
            echo '<script>alert("密码不一致！");</script>';
        }
    }
}
?>

