<?php include_once 'inc/header.php';?>
<?php 
    if(isset($_GET['pid'])){
        
        $pid = $_GET['pid'];
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $quenty   = $_POST['quenty'];
        $addcart = $ct->AddTocart($quenty,$pid);
    }
?>

<?php
	$cmrid = session::get("cmrid");
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
    	$p_id   = $_POST['p_id'];
        $insertcompare = $pd->insertCompareData($p_id,$cmrid);
    }


?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['whichlist'])){
    	//$p_id   = $_POST['p_id'];
        $savewhichlist = $pd->SaveWhichlistData($pid,$cmrId);
    }


?>
<style type="text/css">
	.mybutton {
    width: 100px;
    float: left;
    margin-right: 50px;
}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
				<?php 
					$getPd = $pd->getSingleProduct($pid);
					if($getPd){
						
							while($result = $getPd->fetch_assoc()){
					

							
				?>			
					<div class="grid images_3_of_2">
						<img src="admin/upload/product/<?php echo $result['p_image'];?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['p_name'];?></h2>				
					<div class="price">
						<p>Price: <span>$<?php echo $result['p_price'];?></span></p>
						<p>Category: <span><?php echo $result['cat_name'];?></span></p>
						<p>Brand:<span><?php echo $result['b_name'];?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quenty" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	

				</div>
				<span style="color:red;font-size: 36px;">
				<?php 
						if(isset($addcart)){
							echo $addcart;
						}
					?>
				</span>
				<?php 
						if(isset($insertcompare)){
							echo $insertcompare;
						}
					?>
				<?php 
						if(isset($savewhichlist)){
							echo $savewhichlist;
						}
					?>
				<?php
				

		   		
				    $login = session::get("cmrlogin");
				    if($login == true) { ?>
				<div class="add-cart">
					<div class="mybutton">
						<form action="" method="post">
							<input type="hidden" class="buyfield" name="p_id" value="<?php echo $result['p_id'];?>"/>
							<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
						</form>
					</div>
					<div class="mybutton">	
						<form action="" method="post">
							<input type="submit" class="buysubmit" name="whichlist" value="Save to List"/>
						</form>
					</div>	

				</div>
				<?php } ?>
				
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result['p_des'];?></p>
	    </div>
			<?php } } ?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php 
						$getCat = $cat->getAllcat();
						if($getCat){
							while ($allcat = $getCat->fetch_assoc()) {
								
						
					?>
				      <li><a href="productbycat.php?catId=<?php echo $allcat['cat_id'];?>"><?php echo $allcat['cat_name'];?></a></li>
				    <?php }}?>
    				</ul>
    				
    	
 				</div>
 		</div>
 	</div>
	<?php require_once 'inc/footer.php'; ?>