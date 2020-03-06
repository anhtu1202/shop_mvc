<?php
		include 'inc/header.php'; 
?>	
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart </h2>
			    	<?php 
                		if (isset($_SESSION['success'])) {
                			?>   
                	<div class="alert alert-success">
                		<?php 
                				echo $_SESSION['success'];
                				$_SESSION['success']=null;
                		 ?> 
                	</div>
               	 <?php } ?>
			    	<div style="padding: 10px;">
			    	
			    	<div>

						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
							$subtotal = $qtity = 0;
								if(!empty($this->dataView['cart'])){
								foreach ($this->dataView['cart'] as $key => $result) {
							 ?>
							<tr>
								<td><?php echo $result['product_name']; ?></td>
								<td><img width="100%" src="<?php echo $result['image']; ?>" alt=""/></td>
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
								<td><a onclick="return confirm('Are you sure delete?');" href="?act=cart&cart_id=<?php echo $result['cart_id']; ?>">Xóa</a></td>
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
								$_SESSION["qtity"] = $qtity;
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
							<a href="<?php echo base_path; ?>"> <img src="Uploads/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="?act=payment"> <img src="Uploads/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'Inc/footer.php';
?>	