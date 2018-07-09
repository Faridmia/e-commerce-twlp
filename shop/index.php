<?php require_once 'inc/header.php'; ?>
<?php require_once 'inc/slider.php'; ?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$getFpd = $pd->getFeatureproduct();
	      		if($getFpd){
	      			while ($result = $getFpd->fetch_assoc()){
	      				
	      			
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $result['p_id']; ?>"><img src="admin/upload/product/<?php echo $result['p_image'];?>" alt="" /></a>
					 <h2><?php echo $result['p_name'];?></h2>
					 <p><?php echo $fm->textShorten($result['p_des'],50);?></p>
					 <p><span class="price">$<?php echo $result['p_price'];?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result['p_id']; ?>" class="details">Details</a></span></div>
				</div>
			<?php }} ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
	      		$getNpd = $pd->getNewproduct();
	      		if($getNpd){
	      			while ($result = $getNpd->fetch_assoc()){
	      				
	      			
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $result['p_id']; ?>"><img src="admin/upload/product/<?php echo $result['p_image'];?>" alt="" /></a>
					 <h2><?php echo $result['p_name'];?></h2>
					 <p><span class="price">$<?php echo $result['p_price'];?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result['p_id']; ?>" class="details">Details</a></span></div>
				</div>
			<?php } }?>
			</div>
    </div>
 </div>
 <?php require_once 'inc/footer.php'; ?>
