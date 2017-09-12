<?php
    if(isset($_REQUEST['matl']))
    {
        $matl=$_REQUEST['matl'];
        
        $q="DELETE FROM the_loai_phim WHERE ma_tl=$matl";
        $sql="DELETE FROM the_loai WHERE ma_tl=$matl";
        $conn->exec($q);
        $count=$conn->exec($sql);
        if($count>0)
        {
            header('location:index.php?page=ds_tl');
        }
    }
?>

