<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
	$object = new Brand();
	if(isset($_GET['delbrand'])){
		$delid = $_GET['delbrand'];
		$deletepro = $object->delBrandId($delid);
	}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php
                    if(isset($deletepro)){
                        echo $deletepro;
                    }
                ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$getbrand = $object->getAllbrand();
							if($getbrand){
								$i = 0;
								while($result = $getbrand->fetch_assoc()){ 
									$i++;

								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['b_name'];?></td>
							<td>
								<a href="editbrand.php?bid=<?php echo $result['b_id'];?>">Edit</a> || 
								<a onclick="return confirm('Are you sure want to delete data')" href="?delbrand=<?php echo $result['b_id'];?>">Delete</a></td>
						</tr>
						<?php }} ?>
						
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

