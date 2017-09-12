<style>
    /*.box .movie {
    width: 152px;
    float: left;
    padding-right: 10px;*/
    
   .khung{
          width: 100%;
  background-color:  silver;
    height: 117%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   
    }
  
    .khung:hover{
          opacity: 0.5;
          box-shadow: 5px 3px 5px  #080808;
    }
    .tieu_de{
         text-align: center;
         line-height: 117%;
    }

</style>


<?php
$sql1="SELECT COUNT(DISTINCT phim.ma_p) FROM phim JOIN the_loai_phim ON phim.ma_p=the_loai_phim.ma_p JOIN quoc_gia_phim ON phim.ma_p=quoc_gia_phim.ma_p WHERE video!='' ";
if(isset($_REQUEST['matl']))
{
    $matl=$_REQUEST['matl'];
    $sql1.="And ma_tl=$matl"; 
}
if(isset($_REQUEST['maqg']))
   {
       $maqg=$_REQUEST['maqg'];
       $sql1.="And ma_qg=$maqg";
   } 
    if(isset($_REQUEST['key']))
   {
       $key=$_REQUEST['key'];
       $sql1.="AND ten_p LIKE '%$key%' ";      
   }
$rows1=$conn->query($sql1);
$r1=$rows1->fetch()[0];
$sotrang= ceil($r1/4);

    $sql="SELECT DISTINCT phim.ma_p, ten_p, hinh_anh FROM phim JOIN the_loai_phim ON phim.ma_p=the_loai_phim.ma_p JOIN quoc_gia_phim ON phim.ma_p=quoc_gia_phim.ma_p ";
    
     
   if(isset($_REQUEST['matl']))
   { 
       $q="SELECT ma_tl, ten_tl FROM the_loai WHERE ma_tl=$matl";
     $rows2=$conn->query($q);
       $r2=$rows2->fetch();
       $matl=$_REQUEST['matl'];
       $sql.="And ma_tl=$matl"; 
       echo "<br/><hr>"
       . "<div style='color: #f2a223; margin: 10px 0;'>THỂ LOẠI: $r2[1]</div>"
               . "<hr/>" ;
       
   } 
    elseif(isset($_REQUEST['maqg']))
   {
        $q2="SELECT ma_qg, ten_qg FROM quoc_gia WHERE ma_qg=$maqg";
     $rows3=$conn->query($q2);
       $r3=$rows3->fetch();
       $maqg=$_REQUEST['maqg'];
       $sql.="And ma_qg=$maqg";
       echo "<br/><hr>"
       . "<div style='color: #f2a223; margin: 10px 0;'>QUỐC GIA: $r3[1]</div>"
               . "<hr/>" ;
   } 
    elseif(isset($_REQUEST['key']))
   {
       $key=$_REQUEST['key'];
       $sql.="AND ten_p LIKE '%$key%' ";      
   }
   elseif(isset($_REQUEST['page']) && $_REQUEST['page']=='product')
   {
       echo "<h1 style='color: white;'>Tất cả phim mới</h1>";
       
   }
   else {
    $sql.="WHERE video!=''  ";
    
   }
    $sql.=" ORDER BY phim.ma_p DESC ";
 
if(isset($_REQUEST['p']))
{
    $p=$_REQUEST['p'];
} else {
    $p=1;
}
$start=($p-1)*4;
$sql.=" limit $start, 4 ";
    $rows=$conn->query($sql);
    
  
    foreach ($rows as $r)
    {
     
          
                   echo"                
					<div class='movie-image' style='margin: 30px 30px;'>
                                        <div class ='khung '>
                                     
						<a href='index.php?page=product_detail&maphim=$r[0]'><span class='play'>$r[1]</span><img src='admin/images/$r[2]'  alt='movie'  /></a>
                                                <div class='tieu_de'>
                                                    <p>$r[1]</p>
                                                </div>
                                          
					</div>	
					
				</div>";
                   
            
       
       
    }
    
?>

<div style="clear: both; padding: 30px; ">
   
   <?php
   $link="index.php?page=product";
   
        if(isset($_REQUEST['matl']))
   {
       $matl=$_REQUEST['matl'];
       $link.="&matl=".$matl;    
   } 
     if(isset($_REQUEST['maqg']))
   {
       $maqg=$_REQUEST['maqg'];
       $link.="&maqg=".$maqg;
   } 
    if(isset($_REQUEST['key']))
   {
       $key=$_REQUEST['key'];
       $link.="&key=".$key;      
   }
 
if($sotrang>1)
{
    for($i=1; $i<=$sotrang; $i++)
    {
        echo "<button><a href='$link&p=$i' style='padding: 10px;'> $i</a></button> ";
    }
}
    ?> 
</div>


