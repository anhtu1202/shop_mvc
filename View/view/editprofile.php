<?php 
		include 'inc/header.php'; 
		// if (isset($_GET['product_id']) && $_GET['product_id'] != NULL) {
  //       	$product_id = $_GET['product_id'];
	 //    }else{
	 //        echo "<script>window.location = '404.php';</script>";
	 //    }
        $id = Session::get("customer_id");
	    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
        $update_customer = $cus->update_customer($_POST,$id);
    }

		$login_check = Session::get("customer_login");
			if ($login_check == false) {
				header('Location:login.php');
			}
	
?>	
<style type="text/css">
    input{
        outline-color: red;
        padding: 5px;
        width: 300px
    }
    .save{
        color: white;
        padding: 5px 20px;
        background: black;
        outline-color: red;
        border: none
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
            <form action="" method="post">
    			<table class="tblone">
                    <tr>
                        <td colspan="3">
                            <?php if (isset($update_customer)) {
                                echo $update_customer;
                            } ?>
                        </td>
                    </tr>
    				<?php 
    					$id = Session::get("customer_id");
    					$show_customer = $cus->show_customer($id);
    					if ($show_customer) {
    						while ($result = $show_customer->fetch_assoc()) {
    				 ?>
    				<tr>
    					<td>Name</td>
    					<td>:</td>
    					<td><input type="text" value="<?php echo $result['name']; ?>" name="name"></td>
    				</tr>
    				<tr>
    					<td>Address</td>
    					<td>:</td>
    					<td><input type="text" value="<?php echo $result['address']; ?>" name="address"></td>
    				</tr>
    				<tr>
    					<td>Zip-code</td>
    					<td>:</td>
    					<td><input type="text" value="<?php echo $result['zipcode']; ?>" name="zipcode"></td>
    				</tr>
    				<tr>
    					<td>Phone</td>
    					<td>:</td>
    					<td><input type="text" value="<?php echo $result['phone']; ?>" name="phone"></td>
    				</tr>
    				<tr>
    					<td>Email</td>
    					<td>:</td>
    					<td><input type="text" value="<?php echo $result['email']; ?>" name="email"></td>
    				</tr>
    				<tr>
    					<td colspan="3"><button type="submit" name="save" class="save">Save</button></td>
    				</tr>
    			<?php }} ?>
    			</table>
            </form>
 			</div>
 		</div>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

