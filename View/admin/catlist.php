<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/category.php';
	$cat = new category();
	if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $del_cat = $cat->del_category($cat_id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">     
                	<?php 
                    if (isset($del_cat)) {
                        echo $del_cat;
                    }
                	 ?>	
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_cat = $cat->show_category();
							if (isset($show_cat)) {
								$i = 0;
								while ($result = $show_cat->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['cat_name']; ?></td>
							<td><a href="catedit.php?cat_id=<?php echo $result['cat_id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete?');" href="catlist.php?cat_id=<?php echo $result['cat_id']; ?>">Delete</a></td>
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

