<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">  
                	<?php 
                		if (isset($_SESSION['success'])) {
                			?>   
                	<div class="alert alert-success">
                		<?php 
                				echo $_SESSION['success'];
                				$_SESSION['success']=null;
                		 ?> 
                	</div>
                <?php } ?>
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
							if(!empty($this->dataView)){
							foreach ($this->dataView as $key => $result) {
						?>
						<tr class="odd gradeX">
							<td><?php echo $key+1; ?></td>
							<td><?php echo $result['cat_name']; ?></td>
							<td><a href="?ct=cat&act=catedit&id=<?php echo $result['cat_id']; ?>">Edit</a> || 
							<a onclick="return confirm('Are you sure want to delete?');" 
							href="?ct=cat&act=catdel&id=<?php echo $result['cat_id']; ?>">Delete</a>
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
<?php require_once 'Incad/footer.php';?>

