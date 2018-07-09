<?php include_once 'inc/header.php';?>
<?php 
    $login = session::get("cmrlogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<style type="text/css">
	.tblone{width:550px;margin:0 auto;border:1px solid #ddd;}
	.tblone tr td{text-align: justify;}
	.tblone tr td a{color:green;font-weight: bold;font-size: 24px;}
	.tblone h2{color:green;font-size: 36px;font-weight: bold;}
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
			<table class="tblone">
				<tr>
					
					<td colspan="3"><h2>Your Profile Details</h2></td>
				</tr>
				<tr>
					<td width="20%">Name</td>
					<td width="5%">:</td>
					<td><?php echo $data['cus_name'];?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><?php echo $data['cus_phone'];?></td>
				</tr>
				<tr>
					<td>E-Mail</td>
					<td>:</td>
					<td><?php echo $data['cus_email'];?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><?php echo $data['cus_address'];?></td>
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td><?php echo $data['cus_city'];?></td>
				</tr>
				<tr>
					<td>Zip Code</td>
					<td>:</td>
					<td><?php echo $data['cus_zip'];?></td>
				</tr>
				<tr>
					<td>Country</td>
					<td>:</td>
					<td><?php echo $data['cus_country'];?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><a href="editprofile.php">Update Details</a></td>
				</tr>
				
			</table>
			<?php } } ?>
 				
 		</div>
 	</div>
	<?php require_once 'inc/footer.php'; ?>