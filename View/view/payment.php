<?php 
		include 'inc/header.php'; 
		// if (isset($_GET['product_id']) && $_GET['product_id'] != NULL) {
  //       	$product_id = $_GET['product_id'];
	 //    }else{
	 //        echo "<script>window.location = '404.php';</script>";
	 //    }
	 //    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	 //    	$quantity = $_POST['quantity'];
  //       $insert_cart = $ct->insert_cart($product_id,$quantity);
  //   }

		$login_check = Session::get("customer_login");
			if ($login_check == false) {
				header('Location:login.php');
			}
	
?>	
<style type="text/css">
    .right{
        float: right;
        background: black;
        outline-color: red;
        border: none;
        width: 200px;
        padding: 9px 20px;
    }
    .left{
        float: left;
        background: black;
        outline-color: red;
        border: none;
        width: 200px;
        padding: 9px 20px;
    }
    a{
        color: white;
    }
    .title{
        text-align: center;
        word-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 50px;
        font-size: 20px;
        text-decoration: underline;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group" style="background-color: #ffff99;">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Payment Method</h3>
    		</div>
    		<div class="clear"></div>
            <div style="width: 70%; margin: auto; padding: 50px;">
                <h3 class="title">Choose your method payment</h3>
            <button class="right"><a href="onlinepayment.php">Online Payment</a></button>
            <button class="left"><a href="offlinepayment.php">Offline Payment</a></button>
            </div>
    	</div>
 			</div>
 		</div>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

