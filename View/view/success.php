<?php 
	require_once 'Inc/header.php'; 
?>	

 <div class="main">
    <div class="content">
    	<div class="section group">
			<center>
	    		<h2 style="color: red">Hoàn thành đơn đặt hàng</h2>
	    		<p style="color: lightblue">Tổng giá tiền bạn mua tại website : <?php echo number_format($_SESSION["Grandtotal"]);?> VNĐ & 30,000 Phí ship</p>
	    		<p style="color: lightblue">Chúng tôi sẽ liên lạc cho bạn sớm nhất có thể! Xem chi tiết đơn hàng tại <a href="?act=orderdetails">đây!</a></p>
	    	</center>	
 			</div>
 		</div>
 	</div>


<?php 
        require_once 'Inc/footer.php'; 
?>  

