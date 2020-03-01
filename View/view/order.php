<?php 
		include 'inc/header.php'; 
		include 'inc/slider.php';
		$login_check = Session::get("customer_login");
			   		if ($login_check == false) {
			header('Location:login.php');
			   	}
?>	
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
					<div class="shopping">
						<div class="not_found">
							<h3 style="color: lightblue; text-align: center; font-weight: bold;">Order page</h3>
						</div>
					</div>
				</div>	
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php include 'inc/footer.php'; ?>	