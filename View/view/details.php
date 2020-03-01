<?php 
		include 'inc/header.php'; 
		if (isset($_GET['product_id']) && $_GET['product_id'] != NULL) {
        	$product_id = $_GET['product_id'];
	    }else{
	        echo "<script>window.location = '404.php';</script>";
	    }
	    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	    	$quantity = $_POST['quantity'];
        $insert_cart = $ct->insert_cart($product_id,$quantity);
    }
    	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])) {
    		$customer_id = Session::get('customer_id');
	    	$product_id = $_POST['product_id'];
        $insert_compare = $pro->insert_compare($product_id,$customer_id);
    }

    	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wlist'])) {
    		$customer_id = Session::get('customer_id');
	    	$product_id = $_POST['product_id'];
        $insert_wishlist = $pro->insert_wishlist($product_id,$customer_id);
    }
?>	

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    			$get_product_details = $pro->get_product_details($product_id);
	      		if (isset($get_product_details)) {
		      		while ($result = $get_product_details->fetch_assoc()) {
    		 ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img width="180" height="250" src="admin/uploads/<?php echo $result['product_image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['product_name']; ?></h2>
					<p><?php echo $fm->textShorten($result['product_desc'],40) ?></p>					
					<div class="price">
						<p>Price: <span><?php echo number_format($result['product_price']); ?> VNĐ</span></p>
						<p>Category: <span><?php echo $result['cat_name']; ?></span></p>
						<p>Brand:<span><?php echo $result['brand_name']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						<div style="color: red; font-size: 18px; font-family: Tahoma;">
							<?php if (isset($insert_cart)) {
					    		echo $insert_cart;
					    	} ?>	
			    		</div>
					</form>			
				</div>
				<?php 
					$customer_id = Session::get('customer_id');
					if (isset($customer_id)) {
				 ?>
				<div class="add-cart">
					<form action="" method="post">
						<!-- <a class="buysubmit" href="?wlist=<?php echo $result['product_id']; ?>">Save to wishlist</a>
						<a class="buysubmit" href="?compare=<?php echo $result['product_id']; ?>">Compare product</a> -->
						<input type="hidden" name="product_id" value="<?php echo $result['product_id']; ?>">
						<input type="submit" class="buysubmit" name="compare" value="Compare Product">
						<input type="submit" class="buysubmit" name="wlist" value="Save To Wishlist">
						<br />
						<div style="color: red; font-size: 18px; font-family: Tahoma;">
							<?php if (isset($insert_compare)) {
					    		echo $insert_compare;
					    	} if (isset($insert_wishlist)) {
					    		echo $insert_wishlist;
					    	}
					    	 ?>	
			    	</div>
					</form>
			    	</div>	
			    	<?php }else{
			    		echo "";
			    	} ?>		
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['product_desc']; ?></p>
	    </div>
		<?php }} ?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php 
							$get_All_category = $cat->show_category_FE();
							if ($get_All_category) {
								while ($result = $get_All_category->fetch_assoc()) {
						 ?>
				      <li><a href="productbycat.php?cat_id=<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></a></li>
				  <?php }} ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

