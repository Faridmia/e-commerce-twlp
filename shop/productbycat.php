<?php require_once 'inc/header.php'; ?>
<?php 
	if(!isset($_GET['catId']) || $_GET['catId'] == 'NULL'){
        echo "<script>window.location = '404.php';</script>";
    }
    else{
        $catid = $_GET['catId'];
    }

?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<?php 
	      		$latestCat = $pd->ProductlatestByCat($catid);
	      		if($latestCat){
	      			while ($getProcat = $latestCat->fetch_assoc()) {
	      		
	      	?>
    		<h3>Latest from <?php echo $getProcat['cat_name'];?></h3>
    		<?php }}?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$productByCat = $pd->ProductByCat($catid);
	      		if($productByCat){
	      			while ($getPro = $productByCat->fetch_assoc()) {
	      		
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $getPro['p_id']; ?>"><img src="admin/upload/product/<?php echo $getPro['p_image'];?>" alt="" /></a>
					 <h2><?php echo $getPro['p_name'];?></h2>
					 <p><?php echo $fm->textShorten($getPro['p_des'],50);?></p>
					 <p><span class="price">$<?php echo $getPro['p_price'];?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $getPro['p_id']; ?>" class="details">Details</a></span></div>
				</div>
			<?php  } }else{
				echo "<h2>Product of this Category are not Available...!</h2>";
			}
			?>
			</div>

	
	
    </div>
 </div>
<?php require_once 'inc/footer.php'; ?>

