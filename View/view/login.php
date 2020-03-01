<?php 
	require_once 'Inc/header.php'; 
		require_once 'Inc/slider.php';
 ?>
<div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p><?php 
				if(!empty($this->dataView['msg'])){
					echo $this->dataView['msg'];
				}
		 		?>	 	
		 </p>
        	<form action="" method="post" id="member">
                	<input name="email" type="text" class="field" placeholder="Email" />
                    <input name="password" type="password" class="field" placeholder="Password" />
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button type="submit" name="signin" class="grey">Sign In</button></div></div>
            </form>        
                    </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" />
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City" />
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Zip-Code" />
							</div>
							<div>
								<input type="text" name="email" placeholder="Email" />
							</div>
		    			 </td>
		    			<td>
						<div>	
							<input type="text" name="address" placeholder="Address" />
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="VN">Việt Nam</option>
							<option value="USA">American</option>
							<option value="TQ">Chaina</option>
							<option value="Nga">Russia</option>
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone" />
		          </div>
				  
				  <div> 
					<input type="text" name="password" placeholder="Password" />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button type="submit" name="submit" class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include 'Inc/footer.php'; 
ob_end_flush();
?>