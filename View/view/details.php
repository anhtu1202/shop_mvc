<?php 
		include 'Inc/header.php'; 
		
                    if(!empty($this->dataView)){
                       $result = $this->dataView;
                 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img width="180" height="250" src="<?php echo $result['product_image']; ?>" alt="" />
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
							
			    		</div>
					</form>			
				</div>
				
				<div class="add-cart">
					<form action="" method="post">
						<!-- <a class="buysubmit" href="?wlist=<?php echo $result['product_id']; ?>">Save to wishlist</a>
						<a class="buysubmit" href="?compare=<?php echo $result['product_id']; ?>">Compare product</a> -->
						<input type="hidden" name="product_id" value="<?php echo $result['product_id']; ?>">
						<input type="submit" class="buysubmit" name="compare" value="Compare Product">
						<input type="submit" class="buysubmit" name="wlist" value="Save To Wishlist">
						<br />
						<div style="color: red; font-size: 18px; font-family: Tahoma;">
							
			    	</div>
					</form>
			    	</div>	
			    
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['product_desc']; ?></p>
	    </div>
		<?php } ?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						
				      <li><a href="?cat_id=<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></a></li>
				 
    				</ul>
    	
 				</div>
 		</div>
 	</div>

<?php 
		include 'Inc/footer.php'; 
?>	

