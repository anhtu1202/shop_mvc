<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
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
					<th width="5%">No.</th>
					<th width="15%">Slider Name</th>
					<th width="30%">Slider Image</th>
					<th width="15%">Slider Type</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(!empty($this->dataView)){
						foreach ($this->dataView as $key => $result) {
				?>
				<tr class="odd gradeX">
					<td><?php echo $key+1; ?></td>
					<td><?php echo $result['slide_name']; ?></td>
					<td><img width="55%" src="<?php echo $result['slide_image']; ?>"/></td>		
					<td>
					<?php if ($result['slide_type'] == 0) {
					?>
						<i class="fa fa-eye"></i>
					<?php } else if ($result['slide_type'] == 1) { ?>
						<i class="fa fa-eye-slash"></i>
					<?php } ?>	
				</td>		
				<td>
					<a href="?ct=slide&act=slideedit&id=<?php echo $result['slide_id']; ?>">Edit</a> || 
					<a onclick="return confirm('Are you sure to Delete!');" href="?ct=slide&act=slidedel&id=<?php echo $result['slide_id']; ?>" >Delete</a> 
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
