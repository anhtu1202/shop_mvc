<?php 
		include 'Inc/header.php'; 
		
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
	    		<h3>Sản phẩm của bạn</h3>
	    		</div>
	    		<?php if (!empty($this->dataView['msg'])) {
	    			echo $this->dataView['msg'];
	    		} ?>
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
								if(!empty($this->dataView)){
                                	foreach ($this->dataView as $key => $result) {
                        		 ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $result['product_name']; ?></td>
								<td><img src="<?php echo $result['image']; ?>"></td>
								<td><?php echo number_format($result['price']); ?> VNĐ</td>
								<td><?php echo $result['quantity']; ?></td>
								<td><?php if ($result['status'] == 0) {
									echo "Đang xử lí";
								}else if ($result['status'] == 1){
								?>
								Shipped...
								<?php } else if ($result['status'] == 2) {
									echo "Đã nhận";
								} ?>
								</td>
								<td><?php echo $fm->formatDate($result['day']); ?></td>
								<td>
									<?php if ($result['status'] == 0) {
										echo "N/A";
									}else if ($result['status'] == 1){ ?>
										<a href="?ct=user&act=confirm&confirm_id=<?php echo $result['id']; ?>">Nhận hàng</a></td>
									<?php }else if ($result['status'] == 2) { ?>	
										Đã nhận
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
							<a href="<?php echo base_path; ?>"> <img src="Uploads/shop.png" alt="" /></a>
						</div>
					</div>			
      				 <div class="clear"></div>
    			</div>
	    		</div>
 			</div>
 		</div>
 	</div>


<?php 
		require_once 'Inc/footer.php'; 
?>	

