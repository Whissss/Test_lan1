
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <style>
           .msg{
                background-color: red;
                color: white; 
            }
        </style>
    <body>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $loi=array();
                if(empty($_POST['txtten']))
                {
                    $loi[]='loi_ten';
                }
                if(empty($_POST['txtemail']))
                {
                    $loi[]='loi_email';
                }
                if (!filter_var($_POST['txtemail'], FILTER_VALIDATE_EMAIL)) 
                   {
                    $loi[]='loi_dk_email';
                  }
               if(empty($_POST['txtaLH']))
                {
                    $loi[]='loi_LH';
                }
                if(empty($loi))
                {
                $ten=$_POST['txtten'];
               $email=$_POST['txtemail'];
                $sdt=$_POST['txtsdt'];
               $LH=$_POST['txtaLH'];
                $sql="INSERT INTO lien_he(ho_ten, email, sdt, noi_dung ) VALUES('$ten', '$email', '$sdt', '$LH')";
                $count=$conn->exec($sql);
                if($count>0)
                {                                       
                    echo 'Thành công!';
                } 
                }
            }
        ?>
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">Gửi phản hồi</h1>
                <a href="index.php" style="float: right; padding-right: 10px;"><button class="btn">Quay lại</button></a>
            </div>
            <div class="box-body">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Họ tên:</td>
                    <td>
                        <input type="text" name="txtten" style="width: 500px" value="<?php if(isset($_POST['txtten'])) echo $_POST['txtten']; ?>">
                        <span class="msg">
                            <?php
                                if(!empty($loi) && in_array('loi_ten', $loi))
                                {
                                    echo 'Bạn chưa nhập tên!';
                                }
                               
                            ?>
                                
                        </span>
                    </td>
                </tr>
           
                <tr>
                    <td>email:</td>
                    <td>
                        <input type="text" name="txtemail" style="width: 100px" value="<?php if(isset($_POST['txtemail'])) echo $_POST['txtemail']; ?>">
                         <span class="msg">
                            <?php
                                if(!empty($loi) && in_array('loi_email', $loi))
                                {
                                    echo 'Bạn chưa nhập email!';
                                }
                                 if(!empty($loi) && in_array('loi_dk_email', $loi))
                                {
                                    echo 'Sai định dạng!';
                                }
                            ?>
                                
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
               
                    <td>
                        <input type="text" name="txtsdt" value="<?php if(isset($_POST['txtsdt'])) echo $_POST['txtsdt']; ?>" >  
                         
                    </td>
                </tr>
               
                <tr>
                    <td>Nội dung:</td>
                    <td>
                        <textarea name="txtaLH" class="ckeditor"><?php if(isset($_POST['txtaLH'])) echo $_POST['txtaLH']; ?></textarea>
                         <span class="msg">
                            <?php
                                if(!empty($loi) && in_array('loi_LH', $loi))
                                {
                                    echo 'Bạn chưa nhập thông tin!';
                                }
                        
                            ?>
                         </span>
                    </td>
                </tr>
               
          
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Gửi!" class="btn" style="margin-top: 10px"></td>
                </tr>
            </table>
        </form>
            </div>
        </div>
    </body>

