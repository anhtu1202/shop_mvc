<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
				<?php 
					if(!empty($this->dataView['msg'])){
						echo $this->dataView['msg'];
					}
				 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Order Time</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Customer ID</th>
							<th>Address</th>
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
							<td><?php echo $result['day']; ?></td>
							<td><?php echo $result['product_name']; ?></td>
							<td><?php echo number_format($result['price']); ?> VNĐ</td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['customer_id']; ?></td>
							<td><a href="?ct=user&act=customer&id=<?php echo $result['customer_id']; ?>">Xem khách hàng</a></td>
							<td>
							<?php if ($result['status'] == 0) {
							 ?>
								<a href="?ct=user&act=Ship&shipped=<?php echo $result['id']; ?>&time=<?php echo $result['day']; ?>
								&price=<?php echo $result['price']; ?>">Xử lí...</a>
							<?php }else if ($result['status'] == 1){
							?>
								Shipting...
							<?php }else{ ?>
								<a href="?ct=user&act=delshipped&id=<?php echo $result['id']; ?>">Xóa</a>
							<?php	
							} ?>
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


<?php 
		require_once 'Incad/footer.php'; 
?>	

