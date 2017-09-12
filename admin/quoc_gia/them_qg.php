
    <body>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $quocgia=$_POST['txtquocgia'];
                
            
                $sql="INSERT INTO quoc_gia(ten_qg) VALUES('$quocgia')";
                $count=$conn->exec($sql);
                if($count>0)
                {
                    header('location:index.php?page=ds_qg');
                }
            }
        ?>
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">Thêm quốc gia</h1>
            </div>
            <div class="box-body">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Quốc gia:</td>
                    <td><input type="text" name="txtquocgia"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Thêm mới!" class="btn"></td>
                </tr>
            </table>
        </form>
            </div>
        </div>
    </body>

