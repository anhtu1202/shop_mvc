<?php 
		require_once 'Inc/header.php'; 
?>	

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3>Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    			<table class="tblone">
    				<?php 
                        if(!empty($this->dataView)){
                             foreach ($this->dataView as $key => $result) {
                         ?>
    				<tr>
    					<td>Name</td>
    					<td>:</td>
    					<td><?php echo $result['name']; ?></td>
    				</tr>
    				<tr>
    					<td>Address</td>
    					<td>:</td>
    					<td><?php echo $result['address']; ?></td>
    				</tr>
    				<tr>
    					<td>Phone</td>
    					<td>:</td>
    					<td><?php echo $result['phone']; ?></td>
    				</tr>
    				<tr>
    					<td>Email</td>
    					<td>:</td>
    					<td><?php echo $result['email']; ?></td>
    				</tr>
    				<tr>
    					<td colspan="3"><a href="?act=editprofile" class="btn btn-primary">Update profile</a></td>
    				</tr>
    			<?php }} ?>
    			</table>
 			</div>
 		</div>
 	</div>

<?php 
	include 'Inc/footer.php';
?>	

