<?php 
ob_flush();
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
        	<form action="" method="post" id="member" class="form-group" onsubmit="return Validate()">
                	<input name="email" class="form-inline" required="" type="text" class="field" placeholder="Email" />
                    <input name="password" class="form-inline" required="" type="password" class="field" placeholder="Password" />
                 <p class="note">Nếu bạn ko có tài khoản hãy đăng kí ở form bên cạnh!</p>
                    <div class="buttons"><div><button type="submit" class="btn btn-info" name="signin" class="grey">Sign In</button></div></div>
            </form>        
                    </div>
    	<div class="register_account">
    		<h3>Đăng kí tài khoản mới !</h3>
    		<?php 
				if(!empty($this->dataView['msg'])){
					echo $this->dataView['msg'];
				}
		 		?>	
    		<form action="?act=regis" method="post" class="form-group" onsubmit="return Regex()">
    			<table>
    				<tbody>
    					<tr>
    						<td>
    							<div>
    								<input type="text" class="form-control" id="name" name="name" placeholder="Name" />
    							</div>
    							<div>
    								<input type="text" class="form-control" name="email" placeholder="Email" required="" />
    							</div>
    							<div><img src="Helper/captcha.php" onclick="changeCaptcha(this)" width="100" height="40"/></div>
    							<div>
    								<input type="text" class="form-control" name="captcha" placeholder="Nhập mã captcha" required="" />
    							</div>
    						</td>
    						<td>
    							<div>	
    								<input type="text" class="form-control" name="address" placeholder="Address" />
    							</div>
    							<div>
    							</div>		        

    							<div>
    								<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" />
    							</div>

    							<div> 
    								<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
    							</div>

    							<div> 
    								<input type="password" class="form-control" id="cppassword" name="cppassword" placeholder="Password Confirm" />
    							</div>
    						</td>
    					</tr> 
    				</tbody>
    			</table> 
		   <div class="search"><div><button type="submit" name="submit" class="btn btn-info" class="grey">Create Account</button></div></div>
		    <p class="terms">Bằng cách nhấp vào Create Account bạn đã đồng ý yêu cầu của <a href="#">Khả Nam &amp; Anh Tú</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<script>

	function changeCaptcha(obj){
		    var n = Math.random();
		    obj.setAttribute('src','Helper/captcha.php');
		}

	function Validate() {
		var control = document.getElementsByClassName('form-inline');
                var length = document.getElementsByClassName('form-inline').length;

                for (i = 0; i < length; i++) {
                    var data = control[i].value;
                    if (data == ''){
                        alert('Bạn cần nhập đầy đủ giá trị!');
                        return false;
                    }
                }
	}	

    function Regex() {
        var i;
                var control = document.getElementsByClassName('form-control');
                var length = document.getElementsByClassName('form-control').length;

                for (i = 0; i < length; i++) {
                    var data = control[i].value;
                    if (data == ''){
                        alert('Bạn cần nhập đầy đủ giá trị!');
                        return false;
                    }
                }

                var name = document.getElementById('name').value;
                var phone = document.getElementById('phone').value;
                var password = document.getElementById('password').value;
                var cppassword = document.getElementById('cppassword').value;
                if (!isNaN(name)) {
                    alert('Hãy nhập tên sản phẩm dạng chuỗi');
                     return false;
                } else if (isNaN(phone)) {
                    alert('Hãy nhập price dạng số');
                    return false;
                } else if (password != cppassword) {
                	alert('Password nhập lại không chính xác!');
                    return false;
                }
    }
</script>
<?php include 'Inc/footer.php';
ob_end_flush()
 ?>