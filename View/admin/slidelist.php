<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/product.php';
    $pro = new Product();
    if (isset($_GET['slide_id'])) {
		$slide_id = $_GET['slide_id'];
		$del_slide = $pro->del_slide($slide_id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="15%">Slider Name</th>
					<th width="70%">Slider Image</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$get_all_slider = $pro->get_all_slider();
						if ($get_all_slider) {
							$i=0;
							while ($result = $get_all_slider->fetch_assoc()) {
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><h2><?php echo $result['slide_name']; ?></h2></td>
					<td><img src="uploads/<?php echo $result['slide_image']; ?>" width="35%"/></td>				
				<td>
					<a href="slideedit.php?slide_id=<?php echo $result['slide_id']; ?>">Edit</a> || 
					<a onclick="return confirm('Are you sure to Delete!');" href="?slide_id=<?php echo $result['slide_id']; ?>" >Delete</a> 
				</td>
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
