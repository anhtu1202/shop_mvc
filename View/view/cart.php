<?php ob_start();
		include 'inc/header.php'; 
		include 'inc/slider.php';
        if (isset($_GET['cart_id'])) {
        	$cart_id = $_GET['cart_id'];
        	$del_cart = $ct->del_cart($cart_id);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
			$cart_id = $_POST['cart_id'];
	    	$quantity = $_POST['quantity'];
        	$update_quantity_cart = $ct->update_quantity_cart($cart_id,$quantity);
        }
        if (empty($_GET['product_id'])) {
        	echo "<meta http-equiv='refresh' content='0;URL=?product_id=live'>";
        }
?>	
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart </h2>
			    	<div style="padding: 10px;">
			    	<?php 
			    	if (isset($update_quantity_cart)) {
			    		echo $update_quantity_cart;
			    	}
			    	if (isset($del_cart)) {
			    		echo $del_cart;
			    	}
			    	 ?>
			    	<div>

						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$get_product_cart = $ct->get_product_cart();
								if ($get_product_cart) {
									$subtotal = 0;
									$qtity = 0;
									while ($result = $get_product_cart->fetch_assoc()) {
							 ?>
							<tr>
								<td><?php echo $result['product_name']; ?></td>
								<td><img src="admin/uploads/<?php echo $result['image']; ?>" alt=""/></td>
								<td><?php echo number_format($result['price']); ?> VNĐ</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cart_id" value="<?php echo $result['cart_id']; ?>" />
										<input type="number" name="quantity" min="1" value="<?php echo $result['quantity']; ?>" />
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php $total = $result['price']*$result['quantity'];
								 echo number_format($total); ?> VNĐ</td>
								<td><a onclick="return confirm('Are you sure delete?');" href="?cart_id=<?php echo $result['cart_id']; ?>">Xóa</a></td>
							</tr>
							<?php 
								$subtotal += $total;
								$qtity += $result['quantity'];
						}} ?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php 
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
								<td>TK. 10%</td>
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
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';
	ob_end_flush();
?>	