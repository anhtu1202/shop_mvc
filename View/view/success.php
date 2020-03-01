<?php 
		include 'inc/header.php'; 
		$customer_id = Session::get("customer_id");
		if (empty($customer_id)) {
	         echo "<script>window.location = '404.php';</script>";
	     }
?>	

 <div class="main">
    <div class="content">
    	<div class="section group">
			<center>
	    		<h2 style="color: red">Success Order</h2>
	    		<?php 
	    			$get_amount_price = $ct->get_amount_price($customer_id);
	    			if ($get_amount_price) {
	    				$amount = 0;
	    				while ($result = $get_amount_price->fetch_assoc()) {
	    					$price = $result['price'];
	    					$amount+=$price;
	    			}
	    			}
	    		 ?>
	    		<p style="color: lightblue">Total price you buy from my website : <?php $vat = $amount*0.1;

	    		echo number_format($amount+$vat);?> VNĐ</p>
	    		<p style="color: lightblue">We will contact you as soon as possible! Review the shopping cart <a href="order_details.php">here!</a></p>
	    	</center>	
 			</div>
 		</div>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

