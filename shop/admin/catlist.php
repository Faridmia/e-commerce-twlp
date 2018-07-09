<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
	$object = new Category();
	if(isset($_GET['delcat'])){
		$delid = $_GET['delcat'];
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
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$getcat = $object->getAllcat();
							if($getcat){
								$i = 0;
								while($result = $getcat->fetch_assoc()){ 
									$i++;

								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['cat_name'];?></td>
							<td>
								<a href="editcat.php?catid=<?php echo $result['cat_id'];?>">Edit</a> || 
								<a onclick="return confirm('Are you sure want to delete data')" href="?delcat=<?php echo $result['cat_id'];?>">Delete</a></td>
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

