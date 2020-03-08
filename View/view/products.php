<?php 
		require_once 'Inc/header.php'; 
		require_once 'Inc/slider.php';
	?>

 <div class="main">
    <div class="content">
    	<?php 
			if(!empty($this->dataView)){
				foreach ($this->dataView['brand'] as $key => $result) {
			?>
    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $result['brand_name']; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
			if(!empty($this->dataView)){
				foreach ($this->dataView['pro'] as $key => $resultpro) {
					if ($resultpro['brand_id'] == $result['brand_id']) {
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="?act=details&id=<?php echo $result['product_id']; ?>"><img src="<?php echo $resultpro['product_image'] ?>" alt="" /></a>
					 <h2><?php echo $resultpro['product_name']; ?> </h2>
					 <p><?php echo $fm->textShorten($resultpro['product_desc'],30) ?></p>
					 <p><span class="price"><?php echo number_format($resultpro['product_price']); ?> VNĐ</span></p>
				     <div class="button"><span><a href="?act=details&product_id=<?php echo $resultpro['product_id']; ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php }}} ?>
			</div>
		<?php }} ?>	
    </div>
 </div>

	<?php require_once './Inc/footer.php'; ?>	