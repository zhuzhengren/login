<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>登陆</title>
        <style type="text/css">
            .code{
                width:80px;
            }
            .title{
                font-weight: bold;
                font-size: 20px;
                position: relative;
                left: 50px;
            }
            .bd{
                background-color: #f0f0f0;
                width: 230px;
            }
        </style>
        <script>
            function init(){
                if(myform.username.value==""){
                    alert("请输入用户名");
                    myform.username.focus();
                    return false;
                }
                if(myform.passpwd.value==""){
                    alert("请输入密码");
                    myform.passpwd.focus();
                    return false;
             
                }
                if(myform.code.value==""){
                    alert("请输入验证码");
                    myform.code.focus();
                    return false;
                }
            }
                
        </script>
    </head>
    <body>
        <form action="regcheck.php" method="post" name="myform">
            <div class="bd"></div>
            <div class="title">用户登陆</div>
            <div>
                <span>用户名：</span>
                <span><input type="text" name="username" id="username" placeholder="请输入用户名"></span>
            </div>
            <div>
                <span>密码：</span>
                <span><input type="password" name="userpwd" id="userpwd" placeholder="请输入密码"></span>
            </div>
            <div>
                <span>确认密码：</span>
                <span><input type="password" name="confirm" id="confirm" placeholder="请输入密码"></span>
            </div>
            <div>
                <span>验证码：</span>
                <span><input type="text" name="code" id="code" placeholder="请输入验证码"></span>
                <span><img src="img.php" onclick="this.src"></span>
                
            </div>
            <div>
                <input type="hidden" name="hidden" value="hidden">
            </div>
            <div>
                <span><input type="submit" value="注册"></span>
            </div>
               
        </form>
    </body>
</html>



