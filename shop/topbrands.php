<?php require_once 'inc/header.php'; ?>
<?php 
	
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$getFpd = $pd->TopbrandAccer();
	      		if($getFpd){
	      			while ($result = $getFpd->fetch_assoc()){
	      				
	      			
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?pid=<?php echo $result['p_id']; ?>"><img src="admin/upload/product/<?php echo $result['p_image'];?>" alt="" /></a>
					 <h2><?php echo $result['p_name']; ?></h2>
					 <p><?php echo $result['p_des']; ?></p>
					 <p><span class="price">$<?php echo $result['p_price']; ?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result['p_id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } }?>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      		$getFpd = $pd->TopbrandSamsung();
	      		if($getFpd){
	      			while ($result1 = $getFpd->fetch_assoc()){
	      				
	      			
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
			
					<a href="details.php?pid=<?php echo $result1['p_id']; ?>"><img src="admin/upload/product/<?php echo $result1['p_image'];?>" alt="" /></a>
					 <h2><?php echo $result1['p_name']; ?> </h2>
					 <p><?php echo $result1['p_des']; ?></p>
					 <p><span class="price">$<?php echo $result1['p_price']; ?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result1['p_id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php }} ?>
				
			</div>
			
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Canon</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
	      		$getFpd = $pd->topbrandCanon();
	      		if($getFpd){
	      			while ($result1 = $getFpd->fetch_assoc()){
	      				
	      			
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
			
					<a href="details.php?pid=<?php echo $result1['p_id']; ?>"><img src="admin/upload/product/<?php echo $result1['p_image'];?>" alt="" /></a>
					 <h2><?php echo $result1['p_name']; ?> </h2>
					 <p><?php echo $result1['p_des']; ?></p>
					 <p><span class="price">$<?php echo $result1['p_price']; ?></span></p>
				     <div class="button"><span><a href="details.php?pid=<?php echo $result1['p_id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php }} ?>
			</div>
    </div>
 </div>
<?php require_once 'inc/footer.php'; ?>

