<?php 
		include 'inc/header.php'; 
		include 'inc/slider.php';
?>	
<?php 
	 if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    }else{
        echo "<script>window.location = '404.php';</script>";
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $cat_name = $_POST['cat_name'];
    //     $update_cat = $cat->update_category($cat_id,$cat_name);
    // }
 ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
    			$get_name_cat = $cat->get_name_cat($cat_id);
    			if ($get_name_cat) {
    				while ($result = $get_name_cat->fetch_assoc()) {
    		 ?>
    		<div class="heading">
    		<h3><?php echo $result['cat_name']; ?></h3>
    		</div>
    	<?php }} ?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$get_product_byCat = $cat->get_product_byCat($cat_id);
	      		if ($get_product_byCat) {
	      			while ($result = $get_product_byCat->fetch_assoc()) {
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?product_id=<?php echo $result['product_id']; ?>"><img width="200" height="250" src="admin/uploads/<?php echo $result['product_image']; ?>" alt="" /></a>
					 <h2><?php echo $result['product_name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],40) ?></p>
					 <p><span class="price"><?php echo number_format($result['product_price']); ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id']; ?>" class="details">Xem chi tiết</a></span></div>
				</div>	
				<?php }}else{
					echo "Category not avaiable";
				} ?>			
			</div>
	
    </div>
 </div>

<?php 
		include 'inc/footer.php'; 
?>	