<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__file__));
    include_once ($filepath.'/../classes/slider.php');
    $sd= new Slider();
?>
<?php 
	if(isset($_GET['delsliderid'])){
		$delid = $_GET['delsliderid'];
		$delslider = $sd->delSliderData($delid);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">
        <?php 
        	if(isset($delslider)){
        		echo $delslider;
        	}
        ?>  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Link</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$getSlider = $sd->getSliderData();
				if($getSlider){
					$i = 0;
					while ($result = $getSlider->fetch_assoc()) {
						$i++;
						
					
			?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['slider_title'];?></td>
					<td><?php echo $result['slider_link'];?></td>
					<td><img src="upload/slider/<?php echo $result['slider_image'];?>" height="40px" width="60px"/></td>				
				<td>
					<a href="EditSlider.php?sliderId=<?php echo $result['slider_id'];?>">Edit</a> || 
					<a onclick="return confirm('Are you sure to Delete!');" href="?delsliderid=<?php echo $result['slider_id']; ?>">Delete</a> 
				</td>
				</tr>
			<?php } } ?>	
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
