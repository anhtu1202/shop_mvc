<?php
		include 'inc/header.php'; 
		include 'inc/slider.php';
		if (isset($_GET['product_id'])) {
			$customer_id = Session::get("customer_id");
        	$product_id = $_GET['product_id'];
        	$del_wishlist = $pro->del_wishlist($customer_id,$product_id);
        }
?>	
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Wishlist Product</h2>
			    	<?php if (isset($del_wishlist)) {
			    		echo $del_wishlist;
			    	} ?>
			    	<div style="padding: 10px;">
			    	<div>

						<table class="tblone">
							<tr>
								<th width="15%">ID compare</th>
								<th width="25%">Product Name</th>
								<th width="20%">Image</th>
								<th width="20%">Price</th>
								<th width="20%">Action</th>
							</tr>
							<?php 
								$customer_id = Session::get("customer_id");
								$get_wishlist = $pro->get_wishlist($customer_id);
								if ($get_wishlist) {
										$i = 0;
									while ($result = $get_wishlist->fetch_assoc()) {
										$i++;
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['product_name']; ?></td>
								<td><img src="admin/uploads/<?php echo $result['product_image']; ?>" alt=""/></td>
								<td><?php echo number_format($result['product_price']); ?> VNĐ</td>
								<td><a href="details.php?product_id=<?php echo $result['product_id']; ?>">View </a>
									||
									<a href="?product_id=<?php echo $result['product_id']; ?>"> Remove</a>
								</td>
							</tr>
							<?php 
								
						}} ?>
						</table>
    				</div>  		
    			</div>
			</div>

					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
				<div class="clear"></div>
		</div>
 </div>
<?php include 'inc/footer.php';
?>	