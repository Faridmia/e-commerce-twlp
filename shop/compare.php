<?php require_once 'inc/header.php'; ?>
<?php 
    $login = session::get("cmrlogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<style type="text/css">
	table.tblone img {
    height: 100px;
    width: 80px;
}
</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare</h2>
			    	
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>image</th>
								<th>Action</th>
							</tr>
							<?php 
								$cmrId = session::get("cmrid");
								$getCompareData = $pd->getCompareData($cmrId);
								if($getCompareData){
									$i = 0;
									while($result = $getCompareData->fetch_assoc()){
										$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $result['p_name'];?></td>
								<td>Tk. <?php echo $result['price'];?></td>
								<td><img src="admin/upload/product/<?php echo $result['image']?>" width='200px' height='auto' alt=""/></td>
								<td><a href="details.php?pid=<?php echo $result['p_id']; ?>">view</a></td> 
							</tr>
							
							<?php }} ?>
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft" style="width:100%;text-align: center;">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php require_once 'inc/footer.php'; ?>

