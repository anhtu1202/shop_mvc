<?php 
	require_once 'Inc/header.php'; 
	require_once 'Inc/slider.php';
 ?>
<div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p><?php 
				if(!empty($this->dataView['msg'])){
					echo $this->dataView['msg'];
				}
		 		?>	 	
		 </p>
        	<form action="" method="post" id="member" class="form-group">
                	<input name="email" class="form-control" type="text" class="field" placeholder="Email" />
                    <input name="password" class="form-control" type="password" class="field" placeholder="Password" />
                 <p class="note">Nếu bạn ko có tài khoản hãy đăng kí ở form bên cạnh!</p>
                    <div class="buttons"><div><button type="submit" class="btn btn-info" name="signin" class="grey">Sign In</button></div></div>
            </form>        
                    </div>
    	<div class="register_account">
    		<h3>Đăng kí tài khoản mới !</h3>
    		
    		<form action="" method="post" class="form-group">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" class="form-control" name="name" placeholder="Name" />
							</div>
							
							<div>
							   <input type="text" class="form-control" name="city" placeholder="City" />
							</div>
							
							<div>
								<input type="text" class="form-control" name="zipcode" placeholder="Zip-Code" />
							</div>
							<div>
								<input type="text" class="form-control" name="email" placeholder="Email" />
							</div>
		    			 </td>
		    			<td>
						<div>	
							<input type="text" class="form-control" name="address" placeholder="Address" />
						</div>
		    		<div>
						<select id="country" name="country" class="form-control" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="VN">Việt Nam</option>
							<option value="USA">American</option>
							<option value="TQ">Chaina</option>
							<option value="Nga">Russia</option>
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" class="form-control" name="phone" placeholder="Phone" />
		          </div>
				  
				  <div> 
					<input type="text" class="form-control" name="password" placeholder="Password" />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button type="submit" name="submit" class="btn btn-info" class="grey">Create Account</button></div></div>
		    <p class="terms">Bằng cách nhấp vào Create Account bạn đã đồng ý yêu cầu của <a href="#">Khả Nam &amp; Anh Tú</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include 'Inc/footer.php'; 
ob_end_flush();
?>