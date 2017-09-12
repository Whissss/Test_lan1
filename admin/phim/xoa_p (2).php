<?php
    if(isset($_REQUEST['maphim']))
    {
        $maphim=$_REQUEST['maphim'];
        $sql="DELETE FROM the_loai_phim WHERE ma_p=$maphim";
        $sql1="DELETE FROM quoc_gia_phim WHERE ma_p=$maphim";
        $conn->exec($sql);
         $conn->exec($sql1);
         $q="DELETE FROM phim WHERE ma_p=$maphim";
        
         $count=$conn->exec($q);
         if($count>0)
        {
            
            header('location:index.php?page=ds_p');
        }
    }
?>

