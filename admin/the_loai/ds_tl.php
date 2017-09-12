
        <script>
            function check(ma)
            {
                if(confirm('Ban co muon xoa khong?')==true)
                {
                    window.location="index.php?page=xoa_tl&matl="+ma;
                }
            }
            </script>
   
            <div class="box">
                <div class="box-header">
                    <a href="index.php?page=ds_tl"><h3 class="box-title">Danh sách Thể Loại</h3></a>
                    <a href="index.php?page=them_tl" style="float: right;"><button class="btn">Thêm mới thể loại!</button></a>
                </div>
                <div class="box-body">
        <table class="table table-bordered table-striped table-hover">
            <th>Mã thể loại</th>
            <th>Tên thể loại</th>
            <th>Tùy chọn</th>
            
            <?php
        
               
             
                $sql="SELECT * FROM the_loai";
                $rows=$conn->query($sql);
                foreach ($rows as $r)
                {
                    echo "<tr>"
                        ."<td>$r[0]</td>"
                            ."<td>$r[1]</td>"
                            ."<td>"
                                . "<a href='index.php?page=sua_tl&matl=$r[0]'><img src='images/edit.jpg' width='30px' title='Sửa'></a> "
                                    . "<a href='#' onclick='check($r[0])'><img src='images/delete.jpg' width='30px' title='Xóa'></a>"
                            . "</td>"
                    ."</tr>";
                }
         
            ?>
        </table>
            </div>
            </div>
