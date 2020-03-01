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

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    			<table class="tblone">
    				<?php 
    					$id = Session::get("customer_id");
    					$show_customer = $cus->show_customer($id);
    					if ($show_customer) {
    						while ($result = $show_customer->fetch_assoc()) {
    				 ?>
    				<tr>
    					<td>Name</td>
    					<td>:</td>
    					<td><?php echo $result['name']; ?></td>
    				</tr>
    				<tr>
    					<td>Address</td>
    					<td>:</td>
    					<td><?php echo $result['address']; ?></td>
    				</tr>
    				<tr>
    					<td>City</td>
    					<td>:</td>
    					<td><?php echo $result['city']; ?></td>
    				</tr>
    				<tr>
    					<td>Zip-code</td>
    					<td>:</td>
    					<td><?php echo $result['zipcode']; ?></td>
    				</tr>
    				<tr>
    					<td>Phone</td>
    					<td>:</td>
    					<td><?php echo $result['phone']; ?></td>
    				</tr>
    				<tr>
    					<td>Email</td>
    					<td>:</td>
    					<td><?php echo $result['email']; ?></td>
    				</tr>
    				<tr>
    					<td colspan="3"><a href="editprofile.php">Update profile</a></td>
    				</tr>
    			<?php }} ?>
    			</table>
 			</div>
 		</div>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

