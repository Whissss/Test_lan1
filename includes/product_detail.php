 
<style>
   
    .chu{
        color: #f2a223;
    }
    .khung_dt{
      border: #bcbcbc 2px inset;
      padding: 20px 30px;
      height: 534px;
      background-color: #888888;
    }
    .trai{
        text-align: center;
    }
    .nut{
        padding: 10px 116.5px;
        background-color: #00a157;
        color: white;
    }
    .nut:hover{
        background-color: #01ff70;
        color: white;
    }
    .nut2{
        padding: 10px 128px;
        background-color: #dd4b39; 
        color:white;
    }
    .nut2:hover{
        color: white;
        background-color: red;
    }
    .anh{
        border: white 3px outset;
        bordr-width: 267px;
    }
    a.link{
        color: #f2a223;
    }
</style>

<div class="chu">
<?php
$sql="SELECT phim.ma_p, ten_p, tluong, hinh_anh, ngay_phat_hanh, dd, dien_vien, noi_dung_phim FROM phim JOIN the_loai_phim ON phim.ma_p=the_loai_phim.ma_p JOIN quoc_gia_phim ON phim.ma_p=quoc_gia_phim.ma_p ";

if(isset($_REQUEST['maphim']))
        {          
            $maphim=$_REQUEST['maphim']; 
            $sql.="WHERE phim.ma_p=$maphim";           
        }

           $rows=$conn->query($sql);
         $r=$rows->fetch();

?>
    <br><br/>
    
       <div class="content">
           <h1><?php echo $r[1]; ?></h1>
           <div class="row">
                
               <div class="col-lg-4 trai"><!--class="grid images_3_of_2"-->
                   <div class="anh">
                   <img src="admin/images/<?php echo $r[3]?>" style=" width: 300px; border: 0px; height: 450px"/>
                            
                            <?php echo "<div class='down_btn'><a class='btn1' href='index.php?page=xem_trailer&maphim=$r[0]'><button class='btn nut2'>Trailer</button></a></div>";?>
                            <?php echo"<div class='down_btn'><a class='btn1' href='index.php?page=xem_phim&maphim=$r[0]'><button class='btn nut' >Xem Phim</button></a></div>"; ?> 
                        </div>
                   
                  
               </div>
                     <div class="col-lg-8 khung_dt" >
                                <p class="movie_option"><?php echo 'Thể loại: '; 
                                
$sql1="SELECT the_loai_phim.ma_p, ten_p, tluong, hinh_anh, ngay_phat_hanh, dd, dien_vien, noi_dung_phim, the_loai_phim.ma_tl, ten_tl FROM the_loai_phim JOIN phim ON the_loai_phim.ma_p=phim.ma_p JOIN the_loai ON the_loai_phim.ma_tl=the_loai.ma_tl ";

if(isset($_REQUEST['maphim']))
        {
            
            $maphim=$_REQUEST['maphim'];
         
            $sql1.="WHERE the_loai_phim.ma_p=$maphim";
        }
       
        $rows1=$conn->query($sql1);
        
        foreach ($rows1 as $r1)
        {
           echo "<a href='index.php?page=product&matl=$r1[8]' class='link'>$r1[9]</a>, " ;
        }
        ?></p>
          <p class="movie_option"><?php echo 'Quốc gia: '; 
                                
$sql2="SELECT quoc_gia_phim.ma_p, ten_p, tluong, hinh_anh, ngay_phat_hanh, dd, dien_vien, noi_dung_phim, quoc_gia_phim.ma_qg, ten_qg FROM quoc_gia_phim JOIN phim ON quoc_gia_phim.ma_p=phim.ma_p JOIN quoc_gia ON quoc_gia_phim.ma_qg=quoc_gia.ma_qg ";

if(isset($_REQUEST['maphim']))
        {
            
            $maphim=$_REQUEST['maphim'];
         
            $sql2.="WHERE quoc_gia_phim.ma_p=$maphim";
        }
       
        $rows2=$conn->query($sql2);
        
        foreach ($rows2 as $r2)
        {
           echo "<a href='index.php?page=product&maqg=$r2[8]' class='link' >$r2[9]</a>, " ;
        }
        ?></p>
                                <p style="padding-top: 20px;"><?php echo 'Ngày phát hành: '.$r[4]; ?></p>
                                
                        	<p style="padding-top: 20px;"><?php echo 'Đạo diễn: '.$r[5]; ?></p>
                        	<p style="padding-top: 20px;"><?php echo 'Thời lượng: '.$r[2]; ?></p>
                        	<p style="padding-top: 20px;"><?php echo 'Diễn viên: '.$r[6]; ?> </p>
 
                     
                         <h3 style="border-bottom: none;">Nội Dung Phim</h3>
                            <?php echo"$r[7]"?>
                        </div>
                      
               
           </div>
       </div>
</div>
<!--class="desc1 span_3_of_2"-->