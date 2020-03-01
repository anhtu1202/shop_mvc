	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">

				<div class="listview_1_of_2 images_1_of_2">
					<?php 
						if(!empty($this->dataView['apple'])){
							foreach ($this->dataView['apple'] as $key => $result) {
					?>		
					<div class="listimg listimg_2_of_1">
						 <a href="?act=details&product_id=<?php echo $result['product_id']; ?>">
						  <img src="<?php echo $result['product_image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Apple</h2>
						<p><?php echo $result['product_name']; ?></p>
						<div class="button"><span> <a href="?act=details&product_id=<?php echo $result['product_id']; ?>">Add to cart</a></span></div>
				   </div>
					<?php }} ?>
			   </div>

				<div class="listview_1_of_2 images_1_of_2">
					<?php 
						if(!empty($this->dataView['samsung'])){
							foreach ($this->dataView['samsung'] as $key => $result) {
					?>	
					<div class="listimg listimg_2_of_1">
						 <a href="?act=details&product_id=<?php echo $result['product_id']; ?>">
						 	<img src="<?php echo $result['product_image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $result['product_name']; ?></p>
						<div class="button"><span><a href="?act=details&product_id=<?php echo $result['product_id']; ?>">Add to cart</a></span></div>
				   </div>
				<?php }} ?>
			   </div>
		
			</div>
			<div class="section group">
			
				<div class="listview_1_of_2 images_1_of_2">
					<?php 
						if(!empty($this->dataView['sony'])){
							foreach ($this->dataView['sony'] as $key => $result) {
					?>	
					<div class="listimg listimg_2_of_1">
						 <a href="?act=details&product_id=<?php echo $result['product_id']; ?>">
						 	<img src="<?php echo $result['product_image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $result['product_name']; ?></p>
						<div class="button"><span><a href="?act=details&product_id=<?php echo $result['product_id']; ?>">Add to cart</a></span></div>
				   </div>
				<?php }} ?>
			   </div>
			   
				<div class="listview_1_of_2 images_1_of_2">
					<?php 
						if(!empty($this->dataView['dell'])){
							foreach ($this->dataView['dell'] as $key => $result) {
					?>	
					<div class="listimg listimg_2_of_1">
						 <a href="?act=details&product_id=<?php echo $result['product_id']; ?>">
						 	<img src="<?php echo $result['product_image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $result['product_name']; ?></p>
						<div class="button"><span><a href="?act=details&product_id=<?php echo $result['product_id']; ?>">Add to cart</a></span></div>
				   </div>
				<?php }} ?>
			   </div>
			  
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php 
						if(!empty($this->dataView['slide'])){
							foreach ($this->dataView['slide'] as $key => $result) {
						?>
						<li><img width="100%" src="<?php echo $result['slide_image']; ?>" alt="<?php echo $result['slide_iname']; ?>" /></li>
						<?php }} ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>