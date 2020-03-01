<?php 
		include 'inc/header.php'; 
		 if (isset($_GET['order_id']) && $_GET['order_id'] != NULL) {
        	$customer_id = Session::get("customer_id");
        	$insert_order = $ct->insert_order($customer_id);
			$Dellcart = $ct->del_all_cart(); 
			    header('Location:success.php');
			     				     			    
	    }
?>	
<style type="text/css">
	.box_left{
		width: 55%;
		border: 1px solid #444;
		float: left;
		padding: 10px
	}
	.box_right{
		width: 40%;
		border: 1px solid #444;
		float: right;
		padding: 10px
	}
	.order{
		margin: 10px;
		padding: 10px 20px;
		border: none;
		background: black;
		width: 200px;
		cursor: pointer;
		outline-color: lightblue
	}
	.order > a{
		color: white;
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
	    		<div class="heading">
	    		<h3>Offline Payment</h3>
	    		</div>
	    		<div class="clear"></div>
	    		<div class="box_left">
	    			<div class="cartpage">
			    	<div>

						<table class="tblone">
							<tr>
								<th width="5%">ID</th>
								<th width="15%">Product Name</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
							</tr>
							<?php 
								$get_product_cart = $ct->get_product_cart();
								if ($get_product_cart) {
									$subtotal = 0;
									$qtity = 0;
									$i = 0;
									while ($result = $get_product_cart->fetch_assoc()) {
										$i++;
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['product_name']; ?></td>
								<td><?php echo number_format($result['price']); ?> VNĐ</td>
								<td><?php echo $result['quantity']; ?></td>
								<td><?php $total = $result['price']*$result['quantity'];
								 echo number_format($total); ?> VNĐ</td>
							</tr>
							<?php 
								$subtotal += $total;
								$qtity += $result['quantity'];
						}} ?>
						</table>
						<table style="float:right;text-align:left; margin: 5px;" width="40%">
							<tr>
								<th>Sub Total </th>
								<td>:<?php 
								if (isset($subtotal)) {
								echo number_format($subtotal);
								// Session::set("sum",$subtotal);
								Session::set("qtity",$qtity);
								}else{
									echo "0";
								} ?> VNĐ</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>TK. 10% (<?php echo number_format($subtotal*0.1); ?> VNĐ)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. <?php 
								if (isset($subtotal)) {
								$Grandtotal = ($subtotal*0.1)+$subtotal;
								echo number_format($Grandtotal); 
								}else{
									echo "0";
								}?> VNĐ</td>
							</tr>
					   </table>
					</div>
					
       <div class="clear"></div>
    </div>
	    		</div>
	    		<div class="box_right">
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
    			<?php }} ?>
    			</table>
	    		</div>
 			</div>
 		</div>
 		<center>
 			<button class="order">
 				<a href="?order_id=order">ORDER NOW</a>
 			</button>	
 		</center>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

