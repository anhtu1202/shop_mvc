<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/brand.php';
	$brand = new Brand();
	if (isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
    $del_brand = $brand->del_brand($brand_id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">     
                	<?php 
                    if (isset($del_brand)) {
                        echo $del_brand;
                    }
                	 ?>	
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_brand = $brand->show_brand();
							if (isset($show_brand)) {
								$i = 0;
								while ($result = $show_brand->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brand_name']; ?></td>
							<td><?php echo $result['cat_name'];; ?></td>
							<td><a href="brandedit.php?brand_id=<?php echo $result['brand_id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete?');" href="brandlist.php?brand_id=<?php echo $result['brand_id']; ?>">Delete</a></td>
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

