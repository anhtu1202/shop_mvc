<!DOCTYPE html>
<html>
<head>
	<title>OOP-MVC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="js/jquerymain.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script> 
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
	  $(document).ready(function($){
	    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
	  });
	</script>
</head>
<body>
<link href="Css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="Js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
<?php require_once app_path.'/Helper/format.php';
	$fm = new Format();
 ?>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="<?php echo base_path; ?>"><img width="100%" src="Uploads/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="" method="post">
				    	<input type="text" name="keywords" placeholder="Tìm kiếm..."><input type="submit" value="Search">
				    </form>
			    </div>
			</div>
		<div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="no_product"></span>
							</a>
						</div>
			      </div>	
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="<?php echo base_path; ?>">Home</a></li>
	  <li><a href="?act=products">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <li><a href="">Contact</a> </li>
	  <?php if (isset($_SESSION['auth'])) {
	  	?>
	  	 <li style="float: right;"><a href="<?php echo base_path; ?>?act=logout">Logout</a></li>
	  <?php } else { ?>	 
	  <li style="float: right;"><a href="<?php echo base_path; ?>?act=login">Login</a></li>
	<?php } ?>
	  <div class="clear"></div>
	</ul>
</div>
