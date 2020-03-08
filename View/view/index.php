<?php 
		require_once 'Inc/header.php'; 
		require_once 'Inc/slider.php';
	?>
	
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	     	<?php 
				if(!empty($this->dataView)){
				foreach ($this->dataView['fea'] as $key => $result) {
			 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="?act=details&product_id=<?php echo $result['product_id']; ?>">
					 	<img width="100%" height="200" src="<?php echo $result['product_image']; ?>" alt="" /></a>
					 <h2><?php echo $result['product_name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],30) ?></p>
					 <p><span class="price"><?php echo number_format($result['product_price']); ?> VNĐ</span></p>
				     <div class="button"><span><a href="?act=details&product_id=<?php echo $result['product_id']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php }} ?>			
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
				if(!empty($this->dataView['new'])){
				foreach ($this->dataView['new'] as $key => $result) {
			 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="?act=details&product_id=<?php echo $result['product_id']; ?>">
					 	<img width="100%" height="200" src="<?php echo $result['product_image']; ?>" alt="" /></a>
					 <h2><?php $vv = $result['product_name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],30) ?></p>
					 <p><span class="price"><?php echo number_format($result['product_price']); ?> VNĐ</span></p>
				     <div class="button"><span><a href="?act=details&product_id=<?php echo $result['product_id']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php }} ?>
			</div>
    </div>
 </div>	
		<?php require_once 'Inc/footer.php'; ?>	