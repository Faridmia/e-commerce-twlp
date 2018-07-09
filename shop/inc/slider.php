	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
					$getIphone = $pd->latestFromIphone();
					if($getIphone){
						while($iphone = $getIphone->fetch_assoc()){


						
					
				?>
				
				<div class="listview_1_of_2 images_1_of_2">
				
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pid=<?php echo $iphone['p_id'];?>"><img src="admin/upload/product/<?php echo $iphone['p_image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $iphone['p_name'];?></p>
						<div class="button"><span><a href="details.php?pid=<?php echo $iphone['p_id'];?>">Add to cart</a></span></div>
				   </div>
				   
			   </div>
			   <?php }} ?>
			   <?php 
						$getSamsung = $pd->latestformSamsung();
						if($getSamsung){
							while($samsung = $getSamsung->fetch_assoc()){

						
					?>
			   
				<div class="listview_1_of_2 images_1_of_2">
					
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?pid=<?php echo $samsung['p_id'];?>"><img src="admin/upload/product/<?php echo $samsung['p_image'];?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $samsung['p_name'];?></p>
						  <div class="button"><span><a href="details.php?pid=<?php echo $samsung['p_id'];?>">Add to cart</a></span></div>
					</div>
				
				</div>
				<?php }} ?>
			</div>
			<div class="section group">
				<?php 
						$getaccer = $pd->latestFromAccer();
						if($getaccer){
							while($Accer = $getaccer->fetch_assoc()){

						
					?>

				<div class="listview_1_of_2 images_1_of_2">
				
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?pid=<?php echo $Accer['p_id'];?>"> <img src="admin/upload/product/<?php echo $Accer['p_image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $Accer['p_name'];?></p>
						<div class="button"><span><a href="details.php?pid=<?php echo $Accer['p_id'];?>">Add to cart</a></span></div>
				   </div>
				   
			   </div>
			   <?php }} ?>	
			   <?php 
						$getcanon = $pd->latestFromCanon();
						if($getcanon){
							while($Canon = $getcanon->fetch_assoc()){

						
					?>
			   		
				<div class="listview_1_of_2 images_1_of_2">
					

					<div class="listimg listimg_2_of_1">
						  <a href="details.php?pid=<?php echo $Canon['p_id'];?>"><img src="admin/upload/product/<?php echo $Canon['p_image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p><?php echo $Canon['p_name'];?>.</p>
						  <div class="button"><span><a href="details.php?pid=<?php echo $Canon['p_id'];?>">Add to cart</a></span></div>
					</div>
					
				</div>
				<?php }}?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				
				  <div class="flexslider">
					<ul class="slides">
					<?php 
					$sliderimg = $sd->getSliderImg();
					if($sliderimg){
						while($result = $sliderimg->fetch_assoc()){
					
				?>
						<li><a href="<?php echo $result['slider_link'];?>"><img src="admin/upload/slider/<?php echo $result['slider_image']; ?>" alt="<?php echo $result['slider_title'];?>" title="<?php echo $result['slider_title'];?>" /></a></li>
					<?php } } ?>
				    </ul>
				  </div>
				 
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>