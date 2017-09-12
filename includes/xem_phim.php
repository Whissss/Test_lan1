<?php
if(isset($_REQUEST['maphim']))
{
    $maphim=$_REQUEST['maphim'];
    $sql="SELECT ma_p, ten_p, video FROM phim WHERE ma_p=$maphim";
    $rows=$conn->query($sql);
    foreach ($rows as $r)
    {
        echo "<h1>Xem phim <a href='index.php?page=product_detail&maphim=$r[0]'>$r[1]</a></h1><br/>
            <span style='margin-left:50px;'><video width='900' height='500' controls='' autoplay=''>
    <source src='admin/video/$r[2]' type='video/mp4'>
</video></span>";
                
    }
}    

?>

<span ><h3 style="margin: 120px 0px 0px 50px; ">Bình luận phim</h3></span>
    <div class="fb-comments" style="margin: 0px 0px 20px 50px;" data-href="http://localhost/1/as.php" data-colorscheme="light" data-numposts="5" data-width="500">
        
 
        
        
    </div>
<div id="fb-root"></div>

 