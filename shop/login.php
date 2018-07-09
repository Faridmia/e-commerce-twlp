<?php require_once 'inc/header.php'; ?>

<?php 
	$login = session::get("cmrlogin");
	if($login == true){
		header("Location:orderdetails.php");
	}
?>
<?php 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Login'])){
        $Customerlogin = $cmr->customerlogin($_POST);
    }
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<?php 
    			if(isset($Customerlogin)){
    				echo $Customerlogin;
    			}
    		?>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input type='text' name="email" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                     <div class="buttons"><div><button class="grey" name="Login">Sign In</button></div></div>
                    </div>
                 </form>
                 <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                   
                    
<?php 
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Register'])){
        $CustomerReg = $cmr->customerDataInsert($_POST);
    }
?>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php 
    			if(isset($CustomerReg)){
    				echo $CustomerReg;
    			}
    		?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Your Name">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City">
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip Code">
							</div>
							<div>
								<input type="text" name="email" placeholder="email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="address">
						</div>
		    		<div>
						<select id="country" name="country">
							<option value="">Select a Country</option>         
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="phone">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="Register">Create Account</button></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php require_once 'inc/footer.php'; ?>

