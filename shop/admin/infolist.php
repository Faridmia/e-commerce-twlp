<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__file__));
    include_once ($filepath.'/../classes/slider.php');
    $sd= new Slider();
?>
<?php 
   
    if(isset($_GET['delcom'])){
        $delcomid = $_GET['delcom'];
        $deldata = $sd->delcomData($delcomid);
    }

    
    
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Information List</h2>
                <?php 
                	if(isset($deldata)){
                		echo $deldata;
                	}
                ?>

                <div class="block">      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Company Name</th>
							<th>Phone</th>
							<th>Fax</th>
							<th>E-Mail</th>
							<th>Country</th>
							<th>Facebook</th>
							<th>Twitter</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$getinfo = $sd->getAllinfo();
							if($getinfo){
								$i = 0;
								while($result = $getinfo->fetch_assoc()){ 
									$i++;

								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['com_name'];?></td>
							<td><?php echo $result['com_phone'];?></td>
							<td><?php echo $result['com_fax'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['country'];?></td>
							<td><?php echo $result['facebook'];?></td>
							<td><?php echo $result['twitter'];?></td>
							<td>
								<a href="editcom.php?comid=<?php echo $result['com_id'];?>">Edit</a> || 
								<a onclick="return confirm('Are you sure want to delete data')" href="?delcom=<?php echo $result['com_id'];?>">Delete</a></td>
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

