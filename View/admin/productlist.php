<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
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
					if(!empty($this->dataView)){
					foreach ($this->dataView as $key => $result) {
				?>
				<tr class="odd gradeX">
					<td><?php echo $key+1 ?></td>
					<td><?php echo $result['product_name']; ?></td>
					<td>
						<img width="100" height="100" src="<?php echo $result['product_image']; ?>">
					</td>
					<td><?php echo $result['product_price']; ?></td>
					<td class="center"><?php echo $result['brand_name']; ?></td>
					<td class="center"><?php echo $result['cat_name']; ?></td>
					<td class="center"><?php echo $result['product_type']; ?></td>
					<td><a href="?ct=product&act=productedit&id=<?php echo $result['product_id']; ?>">Edit</a> || 
						<a href="?ct=product&act=productdel&id=<?php echo $result['product_id']; ?>">Delete</a></td>
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
