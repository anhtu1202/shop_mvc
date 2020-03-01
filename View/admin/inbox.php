<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../classes/cart.php');
	require_once ($filepath.'/../helper/format.php');

	$ct = new cart();
	if (isset($_GET['shipped'])) {
    $shipped_id = $_GET['shipped'];
    $shipped = $ct->shipped($shipped_id);
    }
    if (isset($_GET['del_shipped'])) {
    $shipped_id = $_GET['del_shipped'];
    $shipped = $ct->del_shipped($shipped_id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
                	if (isset($shipped)) {
                		echo $shipped;
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
							<th>Customer</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $ct = new cart();
							$fm = new Format();
							$get_order_cart = $ct->get_order_cart();
							if ($get_order_cart) {
								$i = 0;
								while ($result = $get_order_cart->fetch_assoc()) {
									$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $fm->formatDate($result['day']); ?></td>
							<td><?php echo $result['product_name']; ?></td>
							<td><?php echo number_format($result['price']); ?> VNĐ</td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['customer_id']; ?></td>
							<td><a href="customer.php?customer_id=<?php echo $result['customer_id']; ?>">View Customer</a></td>
							<td>
							<?php if ($result['status'] == 0) {
							 ?>
								<a href="?shipped=<?php echo $result['id']; ?>">Pending...</a>
							<?php }else if ($result['status'] == 1){
							?>
								Shipting...
							<?php }else{ ?>
								<a href="?del_shipped=<?php echo $result['id']; ?>">Remove</a>
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
<?php include 'inc/footer.php';?>
