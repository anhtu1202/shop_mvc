<?php 
<<<<<<< HEAD
		include 'Inc/header.php'; 

?>	
<?php 
	 
                    if(!empty($this->dataView['prod'])){
                       $result = $this->dataView['prod'];
                 ?>
   
 					
 <div class="main">
    <div class="content">
    	<div class="content_top">   		
   		<div class="heading">
    		<h3><?php echo $result['cat_name']; ?></h3>
    		</div>
    	<?php } ?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="?act=details&product_id=<?php echo $result['product_id']; ?>"><img width="200" height="250" src="<?php echo $result['product_image']; ?>" alt="" /></a>
=======
	require_once 'Inc/header.php'; 
	require_once 'Inc/slider.php';
 ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		
    		<div class="heading">
    		<h3></h3>
    		</div>
    	
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
    			if(!empty($this->dataView['pro'])){
                    foreach ($this->dataView['pro'] as $key => $result) {
    		 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?product_id=<?php echo $result['product_id']; ?>"><img width="200" height="250" src="<?php echo $result['product_image']; ?>" alt="" /></a>
>>>>>>> 1bc1f759043b114f84d1e704acbceaf135d8baa1
					 <h2><?php echo $result['product_name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],40) ?></p>
					 <p><span class="price"><?php echo number_format($result['product_price']); ?> VNĐ</span></p>
				     <div class="button"><span><a href="?act=details&product_id=<?php echo $result['product_id']; ?>" class="details">Xem chi tiết</a></span></div>
				</div>	
						
			</div>
	
    </div>
 </div>
<?php include 'Inc/footer.php';
 ?>