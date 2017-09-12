<style>
    .khung_p{
        border:   #bcbcbc 1px  inset;
        background-color: #bcbcbc ;
        padding: 0 20px 20px 60px;
    }
</style>


<div id="content">
                                                <div class='slider' style='margin: 40px;'>
                            <?php
                                $sql="SELECT DISTINCT phim.ma_p, ten_p, slide FROM phim JOIN the_loai_phim ON phim.ma_p=the_loai_phim.ma_p JOIN quoc_gia_phim ON phim.ma_p=quoc_gia_phim.ma_p WHERE video='' ORDER BY phim.ma_p DESC limit 5";
                                $rows=$conn->query($sql);
                                foreach ($rows as $r)
                                {
                                    
                                    echo "<div style='width:900px; height: 325px;'>
					                                           
						<a href='index.php?page=product_detail&maphim=$r[0]'><span class='play'><span class='name'>$r[1]</span></span><img src='admin/slide/$r[2]' alt='' style='width:100%;' /></a>

					
				</div>";
                                }
                                
                            ?>
                                </div>
                                <div class="head">
					<h2>MỚI NHẤT</h2>
					<p class="text-right"><a href="index.php?page=product">Tất cả</a></p>
				</div>
                                         
    
    <div class="khung_p">
                                           <?php include 'product.php';?>
    </div>
    
		
                                    <div class="head">
                                            <h2>SẮP RA</h2>
                                            <p class="text-right"><a href="index.php?page=product_trailer">Tất cả</a></p>
                                    </div> 
    
                                    <?php
                                       include 'product_trailer.php'; 
                                    ?>
  
                                            
				
			

</div>
                        
		
		