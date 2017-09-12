
    <body>
        <?php
      
        
        if(isset($_REQUEST['maqg']))
        {
            $maqg=$_REQUEST['maqg'];
            
            $sql="SELECT * FROM quoc_gia WHERE ma_qg=$maqg";
            $rows=$conn->query($sql);
            $r=$rows->fetch();
        }
        
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $quocgia=$_POST['txtquocgia'];
                
                $sql="UPDATE quoc_gia SET ten_qg='$quocgia' WHERE ma_qg=$maqg";
                $count=$conn->exec($sql);
                if($count>0)
                {
                    header('location:index.php?page=ds_qg');
                }
            }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Quốc gia:</td>
                    <td>
                        <input type="text" name="txtquocgia"
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

