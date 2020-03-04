<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
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
							
							if(!empty($this->dataView)){

							foreach ($this->dataView as $key => $result) {

						?>
						
						<tr class="odd gradeX">
							<td><?php echo $result['brand_id']; ?></td>
							<td><?php echo $result['brand_name']; ?></td>
							<td><?php echo $result['cat_name']; ?></td>
							<td><a href="?ct=brand&act=brandedit&id=<?php echo $result['brand_id']; ?>">Edit</a> || 
							<a onclick="return confirm('Are you sure want to delete?');" href="?ct=brand&act=branddel&id=<?php echo $result['brand_id']; ?>">Delete</a></td>

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
<?php require_once 'Incad/footer.php';?>

