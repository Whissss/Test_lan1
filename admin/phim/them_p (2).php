
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
               
                $q="SELECT ma_p, ten_p FROM phim WHERE ten_p!='' ";
               $rows1=$conn->query($q);
               foreach ($rows1 as $r1)
               {
                    if($_POST['txtphim']==$r1[1])
                {
                    $loi[]='loi_ten_phim';
                }
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
                
               
                $sql="INSERT INTO phim(ten_p, tluong, hinh_anh,  ngay_phat_hanh, dd, dien_vien, noi_dung_phim, video, trailer, slide) VALUES('$phim', '$thoiluong', '$ten_anh', '$ngayphathanh', '$daodien', '$dienvien', '$noidung', '$video', '$trailer', '$ten_slide')";
                $count=$conn->exec($sql);
                if($count>0)
                {
                    move_uploaded_file($_FILES['tHA']['tmp_name'], "images/$ten_anh");
                     move_uploaded_file($_FILES['tSL']['tmp_name'], "slide/$ten_slide");
                    $maphim=$conn->lastInsertID();
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
                     $conn->exec($sql2);
                        
                     header('location:index.php?page=ds_p');
                } 
                }
            }
        ?>
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">Thêm phim</h1>
                <a href="index.php" style="float: right; padding-right: 10px;"><button class="btn">Quay lại</button></a>
            </div>
            <div class="box-body">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Phim:</td>
                    <td>
                        <input type="text" name="txtphim" style="width: 500px" value="<?php if(isset($_POST['txtphim'])) echo $_POST['txtphim']; ?>">
                        <span class="msg">
                            <?php
                                if(!empty($loi) && in_array('loi_phim', $loi))
                                {
                                    echo 'Bạn chưa nhập tên phim!';
                                }
                                if(!empty($loi) && in_array('loi_ten_phim', $loi))
                                {
                                    echo 'Phim đã tồn tại';
                                }
                            ?>
                                
                        </span>
                    </td>
                </tr>
           
                <tr>
                    <td>Thời lượng:</td>
                    <td><input type="text" name="txtthoiluong" style="width: 100px" value="<?php if(isset($_POST['txtthoiluong'])) echo $_POST['txtthoiluong']; ?>"></td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
               
                    <td>
                        <input type="file" name="tHA" >  
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
                    <td><input type="text" name="ngayphathanh" style="width: 100px" value="<?php if(isset($_POST['ngayphathanh'])) echo $_POST['ngayphathanh']; ?>"></td>
                </tr>
                <tr>
                    <td>Đạo diễn:</td>
                    <td><input type="text" name="txtdaodien" style="width: 200px" value="<?php if(isset($_POST['txtdaodien'])) echo $_POST['txtdaodien']; ?>"></td>
                </tr>
                <tr>
                    <td>Diễn viên:</td>
                    <td><textarea name="txtadienvien" rows="7" cols="100"><?php if(isset($_POST['txtadienvien'])) echo $_POST['txtadienvien']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Nội dung phim:</td>
                    <td><textarea name="txta" class="ckeditor"><?php if(isset($_POST['txta'])) echo $_POST['txta']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Video:</td>
                    <td><input type="text" name="txtvideo" style="width: 300px" value="<?php if(isset($_POST['txtvideo'])) echo $_POST['txtvideo']; ?>"></td>
                </tr>
                <tr>
                    <td>Trailer:</td>
                    <td>
                        <input type="text" name="txttrailer" style="width: 300px" value="<?php if(isset($_POST['txttrailer'])) echo $_POST['txttrailer']; ?>">
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
                 <tr>
                    <td>Slide:</td>
               
                    <td>
                        <input type="file" name="tSL" >
                        <span class="msg">
                            <?php
                                if(!empty($loi)  && in_array('loi_slide', $loi))
                                {
                                    echo 'Bạn chưa chọn ảnh!';
                                }
                            ?>
                        </span>
                    </td>
                </tr>
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
                    <td><input type="submit" name="btnsubmit" value="Thêm mới!" class="btn" style="margin-top: 10px"></td>
                </tr>
            </table>
        </form>
            </div>
        </div>
    </body>
