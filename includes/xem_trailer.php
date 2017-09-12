<?php
if(isset($_REQUEST['maphim']))
{
    $maphim=$_REQUEST['maphim'];
    $sql="SELECT ma_p, ten_p, trailer FROM phim WHERE ma_p=$maphim";
    $rows=$conn->query($sql);
    foreach ($rows as $r)
    {
        echo "<h1><a href='index.php?page=product_detail&maphim=$r[0]'>$r[1]</a>-Trailer</h1><br/>
            <span style='margin-left:50px;'><video width='900' height='500' controls='' autoplay=''>
    <source src='admin/trailer/$r[2]' type='video/mp4'>
</video></span>";
    }
}    

?>
