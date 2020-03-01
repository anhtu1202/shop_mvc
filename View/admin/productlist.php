<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';
	$product = new Product();
	$show_product = $product->show_product();
	if (isset($_GET['product_id'])) {
		$product_id = $_GET['product_id'];
		$del_product = $product->del_product($product_id);
	}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
        	<?php if (isset($del_product)) {
        		echo $del_product;
        	} ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Product name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Brand</th>
					<th>Category</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if (isset($show_product)) {
						$i = 0;
						while ($result = $show_product->fetch_assoc()) {
							$i++;
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['product_name']; ?></td>
					<td>
						<img width="100" height="100" src="uploads/<?php echo $result['product_image']; ?>">
					</td>
					<td><?php echo $result['product_price']; ?></td>
					<td class="center"><?php echo $result['brand_name']; ?></td>
					<td class="center"><?php echo $result['cat_name']; ?></td>
					<td class="center"><?php echo $result['product_type']; ?></td>
					<td><a href="productedit.php?product_id=<?php echo $result['product_id']; ?>">Edit</a> || <a href="productlist.php?product_id=<?php echo $result['product_id']; ?>">Delete</a></td>
				</tr>
			<?php }} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
