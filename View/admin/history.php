<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>History	</h2>
               <style type="text/css" media="screen">
               	#history{
               		width: 400px;
               		margin: auto;
               	}
               </style>

               <div id="history">
                	
                <h5 >Tổng tiền theo tháng</h5>
                <div class="alert alert-success">
                	<?php 
					if(!empty($this->dataView['msg'])){
						echo number_format($this->dataView['msg']). " VNĐ";
					} else if(!empty($this->dataView['error'])){
						echo $this->dataView['error'];
					}
				 ?>
                	
                </div>
                <form method="POST" action="" class="form-group" >
                	<input type="date" name="date" class="form-control" >
                	<input type="submit" name="submit" value="Tính">
                </form>
            </div>


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
							<th>Total</th>
							<th>Address</th>			
						</tr>
						
					</thead>
					<tbody>
						<?php 
							if(!empty($this->dataView['history'])){
                                foreach ($this->dataView['history'] as $key => $result) {
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $key+1; ?></td>
							<td><?php echo $result['day']; ?></td>
							<td><?php echo $result['product_name']; ?></td>
							<td><?php echo number_format($result['price']); ?> VNĐ</td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['customer_id']; ?></td>
							<td><?php echo number_format($result['quantity']*$result['price']) ?> VNĐ</td>
							<td><a href="?ct=user&act=customer&id=<?php echo $result['customer_id']; ?>">Xem khách hàng</a></td>
							
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

