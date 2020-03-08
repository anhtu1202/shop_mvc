<?php 
        include 'Inc/header.php'; 
        
?>  
<style type="text/css">
    .right{
        float: right;
        background: black;
        outline-color: red;
        border: none;
        width: 200px;
        padding: 9px 20px;
    }
    .left{
        float: left;
        background: black;
        outline-color: red;
        border: none;
        width: 200px;
        padding: 9px 20px;
    }
    a{
        color: white;
    }
    .title{
        text-align: center;
        word-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 50px;
        font-size: 20px;
        text-decoration: underline;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group" style="background-color: #ffff99;">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Thanh toán</h3>
    		</div>
    		<div class="clear"></div>
            <div style="width: 70%; margin: auto; padding: 50px;">
                <h3 class="title">Chọn hình thức thanh toán</h3>
            <button class="right"><a href="?act=onlinepayment">Thanh toán online</a></button>
            <button class="left"><a href="?act=offlinepayment">Thanh toán tiền mặt</a></button>
            </div>
             <button class="btn btn-primary"><a href="<?php echo base_path; ?>">Quay lại</a></button>
    	</div>
 			</div>
 		</div>
 	</div>

<?php 
        require_once 'Inc/footer.php'; 
?>  

