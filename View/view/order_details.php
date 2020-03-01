<?php 
		include 'inc/header.php'; 
		$customer_id = Session::get("customer_id");
		if (empty($customer_id)) {
			header('Location:login.php');
		}

		$ct = new cart();
		if (isset($_GET['confirm_id'])) {
	    $confirm_id = $_GET['confirm_id'];
	    $shipted_confirm = $ct->shipted_confirm($confirm_id);
	    }
?>	
<style type="text/css">
	.box{
		width: 98%;
		border: 1px solid #444;
		padding: 10px
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
	    		<div class="heading">
	    		<h3>Your Details Order</h3>
	    		</div>
	    		<div class="clear"></div>
	    		<div class="box">
	    			<div class="cartpage">
			    	<div>
						<table class="tblone">
							<tr>
								<th width="5%">ID</th>
								<th width="15%">Product Name</th>
								<th width="15%">Image</th>
								<th width="18%">Price</th>
								<th width="15%">Quantity</th>
								<th width="10%">Status</th>
								<th width="15%">Day</th>
								<th width="7%">Action</th>
							</tr>
							<?php 
								$customer_id = Session::get("customer_id");
								$get_product_cart_order = $ct->get_product_cart_order($customer_id);
								if ($get_product_cart_order) {
									$i = 0;
									while ($result = $get_product_cart_order->fetch_assoc()) {
										$i++;
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['product_name']; ?></td>
								<td><img src="admin/uploads/<?php echo $result['image']; ?>"></td>
								<td><?php echo number_format($result['price']); ?> VNĐ</td>
								<td><?php echo $result['quantity']; ?></td>
								<td><?php if ($result['status'] == 0) {
									echo "Pending";
								}else if ($result['status'] == 1){
								?>
								Shipped...
								<?php	
								}else{
									echo "Received";
								} ?>
								</td>
								<td><?php echo $fm->formatDate($result['day']); ?></td>
								<td>
									<?php if ($result['status'] == 0) {
										echo "N/A";
									}else if ($result['status'] == 1){ ?>
										<a href="?confirm_id=<?php echo $result['id']; ?>">Cornfirmed</a></td>
									<?php }else{ ?>	
										Received
									</td>
									<?php } ?>
							</tr>
							<?php 
							}} 
						?>
						</table>
					</div>	
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>			
      				 <div class="clear"></div>
    			</div>
	    		</div>
 			</div>
 		</div>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

