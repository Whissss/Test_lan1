<!DOCTYPE html >
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>Phim Online</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" type="text/css" href="css/css/bootstrap.css"/>
        <link rel="stylesheet" href="css/css/style.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
      
        <link rel="stylesheet" type="text/css" href="css/test/help/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/test/help/css/style.css" />

        <link rel="stylesheet" type="text/css" href="css/test/javascript/slider/themes/minimalist/jquery.slider.css" />
        <script type="text/javascript" src="css/test/javascript/jquery.min.js"></script>
        <script type="text/javascript" src="css/test/javascript/slider/jquery.slider.min.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".slider").slideshow({
        width      : 900,
        height     : 325,
        transition : 'square',
        
      });
    });
  </script>
               <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1404890409585496',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/vi_VN/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
        <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=271292389977787";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
    <body>
    <!--test-->
   

    
    <!--/test-->
    
    
    <?php
    ob_start();
    include 'connect.php';
    session_start();

?>
    

<!-- Shell -->
<div id="shell">
	<!-- Header -->
            <?php include 'includes/header.php'; ?>
        
        
                <?php 
                if(isset($_REQUEST['page']))
                {
                    $page=$_REQUEST['page'];

                    switch ($page)
                    {
                        case 'product_detail':
                            include 'includes/product_detail.php'; 
                            break;
                        case 'product':
                            include 'includes/product.php';
                            break;
                       case 'xem_phim':
                            include 'includes/xem_phim.php';
                            break;
                        case 'xem_trailer':
                            include 'includes/xem_trailer.php';
                            break;
                       
                        case 'product_trailer':
                            include 'includes/product_trailer.php';
                            break;
                        case 'lien_he':
                            include 'includes/lien_he.php';
                            break;
                        
                        
                      
                       
                    }
                
                } else {
                     include 'includes/content.php'; 
                }
              ?>  
      
		<div class="cl">&nbsp;</div>
	
	<!-- end Main -->

	<!-- Footer -->
       
            <?php include 'includes/footer.php'; ?>
       
	<!-- end Footer -->
  
</div>
<!-- end Shell -->
</body>
</html>