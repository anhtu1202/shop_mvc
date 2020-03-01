<?php 
		include 'inc/header.php'; 
		include 'inc/slider.php';
?>	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
			    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			        $keywords = $_POST['keywords'];
			        $search = $pro->search($keywords);
			    }
			 ?>
    		<div class="heading">
    		<h3>Từ khóa tìm kiếm: <?php if ($search) {
    			echo $keywords;
    		}else{
    			echo "There are no products for '".$keywords."'";
    		} ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		if ($search) {
	      			while ($result = $search->fetch_assoc()) {
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?product_id=<?php echo $result['product_id']; ?>"><img width="200" height="250" src="admin/uploads/<?php echo $result['product_image']; ?>" alt="" /></a>
					 <h2><?php echo $result['product_name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],40) ?></p>
					 <p><span class="price"><?php echo number_format($result['product_price']); ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id']; ?>" class="details">Xem chi tiết</a></span></div>
				</div>	
				<?php }
				} ?>			
			</div>
	
    </div>
 </div>

<?php 
		include 'inc/footer.php'; 
?>	