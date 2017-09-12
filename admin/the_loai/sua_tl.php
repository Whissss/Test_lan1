
    <body>
        <?php
       
        
        if(isset($_REQUEST['matl']))
        {
            $matl=$_REQUEST['matl'];
            
            $sql="SELECT * FROM the_loai WHERE ma_tl=$matl";
            $rows=$conn->query($sql);
            $r=$rows->fetch();
        }
        
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $theloai=$_POST['txttheloai'];
                
                $sql="UPDATE the_loai SET ten_tl='$theloai' WHERE ma_tl=$matl";
                $count=$conn->exec($sql);
                if($count>0)
                {
                    header('location:index.php?page=ds_tl');
                }
            }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Thể loại:</td>
                    <td>
                        <input type="text" name="txttheloai"
                               value="<?php if(isset($r)) echo $r[1]; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Sửa"></td>
                </tr>
            </table>
        </form>
    </body>

