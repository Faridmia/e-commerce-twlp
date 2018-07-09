<?php include_once 'inc/header.php';?>
<?php 
    $login = session::get("cmrlogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<?php
	$cmrid = session::get("cmrid");
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $customerupdate = $cmr->customerdetailupdate($_POST,$cmrid);
    }


?>
<style type="text/css">
	.tblone{width:550px;margin:0 auto;border:1px solid #ddd;}
	.tblone tr td{text-align: justify;}
	.tblone tr td a{color:green;font-weight: bold;font-size: 24px;}
	.tblone h2{color:green;font-size: 36px;font-weight: bold;}
	.tblone input[type="text"]{width:300px;padding:5px;font-size: 15px;}
	.tblone input[type='submit']{width:100px;height:40px;font-size: 20px!important;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    <?php 
    	$id = session::get("cmrid");
    	$getData = $cmr->getCmrProfile($id);
    	if($getData){
    		while($data = $getData->fetch_assoc()){
    ?>

    	<form action="" method="post">
			<table class="tblone">
				<?php
				if(isset($customerupdate)){
				 echo "<tr><td colspan='2'><h2>".$customerupdate."</h2></td></tr>";
			    }
				?>
				<tr>
					
					<td colspan="2">
						<h2>Update Profile Details</h2>
						
						
							
					
					</td>

				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="cus_name" value="<?php echo $data['cus_name'];?>"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="cus_phone" value="<?php echo $data['cus_phone'];?>"></td>
				</tr>
				<tr>
					<td>E-Mail</td>
					<td><input type="text" name="cus_email" value="<?php echo $data['cus_email'];?>"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="cus_address" value="<?php echo $data['cus_address'];?>"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type="text" name="cus_city" value="<?php echo $data['cus_city'];?>"></td>
				</tr>
				<tr>
					<td>Zip Code</td>
					<td><input type="text" name="cus_zip" value="<?php echo $data['cus_zip'];?>"></td>
				</tr>
				<tr>
					<td>Country</td>
					<td><input type="text" name="cus_country" value="<?php echo $data['cus_country'];?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="update"></td>
				</tr>
				
			</table>
		</form>
			<?php } } ?>
 				
 		</div>
 	</div>
	<?php require_once 'inc/footer.php'; ?>