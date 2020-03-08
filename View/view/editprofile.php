<?php 
		require_once 'Inc/header.php'; 
?>	
<style type="text/css">
    .content input{
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
    		<h3>Thông tin khách hàng</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
            <form action="" method="post">
    			<table class="tblone">
                    <tr>
                        <td colspan="3">
                          <?php 
                            if(!empty($this->dataView['msg'])){
                                 echo $this->dataView['msg'];
                             }
                            ?>
                        </td>
                    </tr>
    				<?php 
                        if(!empty($this->dataView)){
                                $result = $this->dataView;
                         ?>
                   <input type="hidden" value="<?php echo $result['id']; ?>" name="id">
              
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
    			<?php } ?>
    			</table>
            </form>
 			</div>
 		</div>
 	</div>

<?php 
		include 'inc/footer.php'; 
?>	

