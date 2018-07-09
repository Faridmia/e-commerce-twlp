<?php require_once 'inc/header.php'; ?>
<?php 
	if(isset($_GET['delpro'])){
		$deldata = $_GET['delpro'];
		$delproduct = $ct->delProductBuyCart($deldata);
	}
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cartid   = $_POST['cartid'];
        $quenty   = $_POST['quenty'];
        $updatecart = $ct->UpdateCartquenty($cartid,$quenty);
        if($quenty < 0){
        	$delproduct = $ct->delProductBuyCart($cartid);
        }
    }
?>

<?php 
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php 
			    		if(isset($updatecart)){
			    			echo $updatecart;

			    		}
			    		if(isset($delproduct)){
			    			echo $delproduct;

			    		}
			    	?>
						<table class="tblone">
							<tr><th width="5%">SL</th>
								<th width="20%">Product Name</th>
								<th width="30%">Image</th>
								<th width="10%">Price</th>
								<th width="10%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$getcart = $ct->getcartProduct();
								if($getcart){
									$i = 0;
									$sum = 0;
									$qty = 0;

									while($result = $getcart->fetch_assoc()){
										$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['p_name'];?></td>
								<td><img src="admin/upload/product/<?php echo $result['image']?>" width='200px' height='auto' alt=""/></td>
								<td>Tk. <?php echo $result['price'];?></td>
								<td>
						<form action="" method="post">
							<input type="hidden" name="cartid" value="<?php echo $result['cart_id'];?>"/>
							<input type="number" name="quenty" value="<?php echo $result['quenty'];?>"/>
							<input type="submit" name="submit" value="Update"/>
						</form>
								</td>
								<td>Tk. <?php 
									$total = $result['price'] * $result['quenty'];
								    echo $total;
								?></td>
								<td><a onclick="return confirm('Are you sure want to delete');" href="?delpro=<?php echo $result['cart_id'];?>">X</a></td> 
							</tr>
							<?php  
								$qty = $qty + $result['quenty'];
								$sum = $sum + $total;
								session::set("qty",$qty);
								session::set("sum",$sum);
							?>
							<?php }} ?>
						</table>
						<?php 
							$checkcart = $ct->checkcarttable();
						   if($checkcart){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
									<?php 
										$vat = $sum * 0.10;
										$gtotal = $sum + $vat;
										echo $gtotal." Tk";
									?>
								</td>
							</tr>
					   </table>
					   <?php }else{
					   		header("location:index.php");
					    }
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php require_once 'inc/footer.php'; ?>

