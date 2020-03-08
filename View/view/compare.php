<?php 
		require_once 'Inc/header.php'; 
		require_once 'Inc/slider.php';
	?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Sản phẩm so sánh</h2>
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
								if(!empty($this->dataView['compare'])){
								foreach ($this->dataView['compare'] as $key => $result) {
							 ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $result['product_name']; ?></td>
								<td><img src="<?php echo $result['product_image']; ?>" alt=""/></td>
								<td><?php echo number_format($result['product_price']); ?> VNĐ</td>
								<td><a href="?act=details&product_id=<?php echo $result['product_id']; ?>">View</a></td>
							</tr>
							<?php 
								
						}} else {
							echo "<span class='success'><b>Không có sản phẩm nào để so sánh!</b></span>";
						} ?>
						</table>
    				</div>  		
    			</div>
			</div>

					<div class="shopping">
						<div class="shopleft">
							<a href="<?php echo base_path; ?>"> <img src="Uploads/shop.png" alt="" /></a>
						</div>
					</div>
				<div class="clear"></div>
		</div>
 </div>

<?php 
		include 'Inc/footer.php'; 
?>	