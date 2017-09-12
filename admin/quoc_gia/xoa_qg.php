<?php
    if(isset($_REQUEST['maqg']))
    {
        $maqg=$_REQUEST['maqg'];
        
        $q="DELETE FROM quoc_gia_phim WHERE ma_qg=$maqg";
        $sql="DELETE FROM quoc_gia WHERE ma_qg = $maqg";
        $conn->exec($q);
        $count=$conn->exec($sql);
        if($count>0)
        {
            header('location:index.php?page=ds_qg');
        }
    }
?>

