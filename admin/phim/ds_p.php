
<script>
   
            function check(ma)
           {
               if(confirm('Bạn có muốn xóa không?')==true)
                {
                   window.location="index.php?page=xoa_p&maphim="+ma;
                }
            }
</script>
        
<div class="box">
    
    <div class="box-header">
        <?php
            if($_SERVER['REQUEST_METHOD']=='GET')
            {
                $loi=array();
                if(isset($_GET['key']) && $_GET['key']=='')
                {
                    $loi[]='loi_search';
                } else {
                    echo '';
                }
            }
        ?>
      
        <form action="index.php" method="get">
            <table style="float: right; margin-top: 5px;">
                <tr>
                    <td> 
                        
                        <input type="hidden" name="page" value="ds_p">
                        <input type="text" name="key" placeholder="Nhập tên phim cần tìm..." style="width: 280px;" >
                        
                    </td>
                    <td> 
                        <input type="submit" value="Tìm kiếm!" >
                    </td>
             </tr>
             <tr>
                 <td>
                 <span style="background-color: red; color: white; ">
                            <?php
                                if(!empty($loi) && in_array('loi_search', $loi))
                                {
                                    echo 'Bạn phải nhập tên phim trước khi tìm kiếm!';
                                }
                            ?>
                        </span>
                 </td>
             </tr>
            </table>
         </form>
        <h3 class="box-title"><a href="index.php?page=ds_p" style="color: black;">Danh sách Phim</a></h3>
         <button class="btn"><a href="index.php?page=them_p">Thêm mới phim!</a></button>
         
    </div>
    
    <div class="box-body">
        <table class=" table table-bordered table-striped table-hover " >
            <th>Mã Phim</th>
            <th>Tên Phim</th>
          
            <th>Hình ảnh</th>
          
            <th>Video</th>
            <th>Trailer</th>
         
            
            <th>Tùy chọn</th>
            
            <?php
              
          $sql1="SELECT DISTINCT ma_p, ten_p, hinh_anh, video, trailer FROM phim ";
            if(isset($_REQUEST['key']))
                {
                    $key=$_REQUEST['key'];
                    $sql1.=" WHERE ten_p LIKE '%$key%' ";      
                }
                      
            $sql1.=" ORDER BY ma_p DESC ";
            if(isset($_REQUEST['p']))
            {
                $p=$_REQUEST['p'];
            } else {
                $p=1;
            }
            $start=($p-1)*5;
            $sql1.=" limit $start, 5 ";
            $rows1=$conn->query($sql1); 
               foreach ($rows1 as $r1)
               {
    
                   echo "<tr>"
                           
                          ."<td>$r1[0]</td>"
                           ."<td style='width: 150px'>$r1[1]</td>"
                           
                           ."<td><img src='images/$r1[2]' width='100px'></td>"
                           
                           ."<td>$r1[3]</td>"
                           ."<td>$r1[4]</td>"
                         
                           ."<td>"
                                ."<a href='index.php?page=sua_p&maphim=$r1[0]'  ><img src='images/edit.jpg' width='30px' title='Sửa'></a> "
                               
                            
                                ."<a href='#' onclick='check($r1[0])'><img src='images/delete.jpg' width='30px' title='Xóa'></a> "
                           . "</td>"
                        
                           
                        ."</tr>";
               
               } 
            ?>
            <?php 
                $sql="SELECT COUNT(DISTINCT phim.ma_p) FROM phim JOIN the_loai_phim ON phim.ma_p=the_loai_phim.ma_p JOIN quoc_gia_phim ON phim.ma_p=quoc_gia_phim.ma_p ";

    if(isset($_REQUEST['key']))
   {
       $key=$_REQUEST['key'];
       $sql.="AND ten_p LIKE '%$key%' ";      
   }
        $rows=$conn->query($sql);
        $r=$rows->fetch()[0];
        $sotrang= ceil($r/5);
            ?>
            
            
            
        </table>
       <div style="clear: both; float: right; margin-top: 10px">
   
            <?php
            $link="index.php?page=ds_p";

             if(isset($_REQUEST['key']))
            {
                $key=$_REQUEST['key'];
                $link.="&key=".$key;      
            }

         if($sotrang>1)
         {
             for($i=1; $i<=$sotrang; $i++)
             {
                 echo "<a href='$link&p=$i'><button class='btn'>$i</button></a>";
             }
         }
             ?> 
            </div>
</div>
</div>
