
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <style>
           .msg{
                background-color: red;
                color: white; 
            }
        </style>
    <body>
        <?php
      
        
        if(isset($_REQUEST['maphim']))
        {
            $maphim=$_REQUEST['maphim'];
            
            $sql="SELECT ma_p, ten_p, tluong, hinh_anh, ngay_phat_hanh, dd, dien_vien, noi_dung_phim, video, trailer, slide FROM phim WHERE ma_p=$maphim";
            $rows=$conn->query($sql);
            $r=$rows->fetch();
        }
        
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $loi=array();
                if(empty($_POST['txtphim']))
                {
                    $loi[]='loi_phim';
                }
                if(empty($_POST['txttrailer']))
                {
                    $loi[]='loi_trailer';
                }
                if(!isset($_POST['cbTL']))
                {
                    $loi[]='loi_the_loai';
                }
                if(!isset($_POST['cbQG']))
                {
                    $loi[]='loi_quoc_gia';
                }
                 if($_FILES['tHA']['name']==FALSE)
                {
                    $loi[]='loi_anh';
                }
                if($_FILES['tSL']['name']==FALSE)
                {
                    $loi[]='loi_slide';
                }
                if(empty($loi))
                {
                $phim=$_POST['txtphim'];
                $thoiluong=$_POST['txtthoiluong'];
                $ten_anh=$_FILES['tHA']['name'];
                $ngayphathanh=$_POST['ngayphathanh'];
                $daodien=$_POST['txtdaodien'];
                $dienvien=$_POST['txtadienvien'];
                $noidung=$_POST['txta'];
                $video=$_POST['txtvideo'];
                $trailer=$_POST['txttrailer'];
                $ten_slide=$_FILES['tSL']['name'];
                $sql="UPDATE phim SET ten_p='$phim', tluong='$thoiluong', hinh_anh='$ten_anh', ngay_phat_hanh='$ngayphathanh', dd='$daodien', dien_vien='$dienvien', noi_dung_phim='$noidung', video='$video', trailer='$trailer', slide='$ten_slide' WHERE ma_p=$maphim";
              
               $conn->exec($sql);
                
                $q="DELETE FROM the_loai_phim WHERE ma_p=$maphim";
                 $q2="DELETE FROM quoc_gia_phim WHERE ma_p=$maphim";
                $conn->exec($q);
                $conn->exec($q2);
                 $sql1="INSERT INTO the_loai_phim(ma_tl, ma_p) VALUES";
                $sql2="INSERT INTO quoc_gia_phim(ma_qg, ma_p) VALUES";
                    foreach ($_POST['cbTL'] as $v1)
                    {
                        $sql1.="($v1, $maphim),";
                    }
                    foreach ($_POST['cbQG'] as $v2)
                    {
                        $sql2.="($v2, $maphim),";
                    }
                    $sql1= substr($sql1,0, strlen($sql1)-1);
                    $sql2= substr($sql2,0, strlen($sql2)-1);
                 $conn->exec($sql1);
                   $count= $conn->exec($sql2);
                    move_uploaded_file($_FILES['tHA']['tmp_name'], "images/$ten_anh");
                    move_uploaded_file($_FILES['tSL']['tmp_name'], "slide/$ten_slide");
                if($count>0)
                {
                    header('location:index.php?page=ds_p');
                }   
                }
            }
        ?>
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">Sửa phim</h1>
                <a href="index.php?page=ds_p"><button class="btn" style="float: right; margin-right: 10px;">Trở lại</button></a>
            </div>
            <div class="box-body">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Phim:</td>
                    <td>
                        <input type="text" name="txtphim" style="width: 500px"
                               value="<?php if(isset($r)) echo $r[1]; ?>">
                       
                             <span class="msg">
                            <?php
                                if(!empty($loi) && in_array('loi_phim', $loi))
                                {
                                    echo 'Bạn chưa nhập tên phim!';
                                }
                            ?>
                        </span>
                        
                    </td>
                </tr>
             
                <tr>
                    <td>Thời lượng:</td>
                    <td>
                        <input type="text" name="txtthoiluong" style="width: 100px"
                               value="<?php if(isset($r)) echo $r[2]; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
                    <td>
                        <input type="file" name="tHA">
                              <?php if(isset($r)) echo"<img src='images/$r[3]' width='300px'>"; 
                                  
                              ?>
                        <span class="msg">
                            <?php
                                if(!empty($loi)  && in_array('loi_anh', $loi))
                                {
                                    echo 'Bạn chưa chọn ảnh!';
                                }
                            ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Ngày phát hành:</td>
                    <td>
                        <input type="text" name="ngayphathanh" style="width: 100px"
                               value="<?php if(isset($r)) echo $r[4]; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Đạo diễn:</td>
                    <td>
                        <input type="text" name="txtdaodien"
                               value="<?php if(isset($r)) echo $r[5]; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Diễn viên:</td>
                    <td>
                        <textarea name="txtadienvien" rows="7" cols="70">
                            <?php
                                if(isset($r)) echo $r[6];
                            ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Nội dung phim:</td>
                    <td>
                        <textarea name="txta" class="ckeditor">
                            <?php
                                if(isset($r)) echo $r[7];
                            ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Video:</td>
                    <td><input type="text" name="txtvideo" style="width: 300px" value="<?php if(isset($r)) echo $r[8]; ?>"></td>
                </tr>
                 <tr>
                    <td>Trailer:</td>
                    <td>
                        <input type="text" name="txttrailer" style="width: 300px" value="<?php if(isset($r)) echo $r[9]; ?>">
                         <span class="msg">
                            <?php
                                if(!empty($loi) && in_array('loi_trailer', $loi))
                                {
                                    echo 'Bạn chưa nhập trailer!';
                                }
                            ?>
                        </span>
                    </td>
                </tr>
                <td>Slide:</td>
                    <td>
                        <input type="file" name="tSL">
                              <?php if(isset($r)) echo"<img src='slide/$r[10]' width='300px'>"; 
                                  
                              ?>
                        <span class="msg">
                            <?php
                                if(!empty($loi)  && in_array('loi_slide', $loi))
                                {
                                    echo 'Bạn chưa chọn ảnh!';
                                }
                            ?>
                        </span>
                    </td>
                <tr>
                    <td>Thể loại:</td>
                    <td>
                        <?php
                            $sql="SELECT ma_tl, ten_tl FROM the_loai";
                            $rows=$conn->query($sql);
                            foreach ($rows as $r)
                            {
                               
                                echo "<input type='checkbox' name='cbTL[]' value='$r[0]'>$r[1] ";
                            }
                        ?>
                         <span class="msg">
                            <?php
                                 if(!empty($loi) && in_array('loi_the_loai', $loi))
                            {
                                echo 'Bạn chưa chọn thể loại!';
                            }
                            ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Quốc gia:</td>
                    <td>
                        <?php
                            $sql="SELECT ma_qg, ten_qg FROM quoc_gia";
                            $rows=$conn->query($sql);
                            foreach ($rows as $r)
                            {
                                echo "<input type='checkbox' name='cbQG[]' value='$r[0]'>$r[1] ";
                            }
                        ?>
                          <span class="msg">
                            <?php
                                 if(!empty($loi) && in_array('loi_quoc_gia', $loi))
                            {
                                echo 'Bạn chưa chọn quốc gia!';
                            }
                            ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Sửa"></td>
                </tr>
            </table>
        </form>
            </div>
        </div>
    </body>

