<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Đăng nhập</title>
    </head>
    <body >
        <?php
            ob_start();
            include '../connect.php';
        ?>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $admin=$_POST['txtadmin'];
                $pass=md5($_POST['pass']);
              
                $sql="SELECT COUNT(*) FROM admin WHERE tk_admin='$admin' and mat_khau='$pass'";
                $rows=$conn->query($sql);
                $r=$rows->fetch();
                
                if($r[0]==1)
                {
                    setcookie('login_admin', 'ok', time()+86400);
                    header('location:index.php');
                }
                else
                {
                    echo 'Khong ton tai';
                }
              
            }
        ?>
   
        <form action="" method="post">
            <table style=" width: 400px; margin: auto; padding-top: 230px ">
                <tr>
                    <td>Ten dang nhap:</td>
                    <td><input type="text" name="txtadmin"></td>
                </tr>
                <tr>
                    <td>Mat khau:</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" style="border-radius: 3px; border-style: groove" value="Dang nhap"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
