


<body>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $theloai=$_POST['txttheloai'];
              
                $sql="INSERT INTO the_loai(ten_tl) VALUES('$theloai')";
                $count=$conn->exec($sql);
                if($count>0)
                {
                    header('location:index.php?page=ds_tl');
                }
            }
        ?>
    <div class="box">
             <div class="box-header">
                <h1 class="box-title">Thêm thể loại</h1>
            </div>
            <div class="box-body">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Thể loại:</td>
                    <td><input type="text" name="txttheloai"></td>
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

