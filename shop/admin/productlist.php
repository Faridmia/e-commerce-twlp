<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php require_once '../helpers/formate.php';?>
<?php include '../classes/product.php';?>
<?php 
	$pd = new Product();
	$fm = new Format();
?>
<?php
	if(isset($_GET['delproduct'])){
		$delid = $_GET['delproduct'];
		$deletepro = $pd->delProductById($delid);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">
        <?php 
        	if(isset($deletepro)){
        		echo $deletepro;
        	}
        ?>  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>price</th>
					<th>image</th>
					<th>type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$getProduct = $pd->getAllproduct();
					if($getProduct){
						$i = 0;
						while($result = $getProduct->fetch_assoc()){
							$i++;
					
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['p_name'];?></td>
					<td><?php echo $result['cat_name'];?></td>
					<td><?php echo $result['b_name'];?></td>
					<td><?php echo $fm->textShorten($result['p_des'],50);?></td>
					<td>$<?php echo $result['p_price'];?></td>
					<td><img src="upload/product/<?php echo $result['p_image'];?>" height="40px" width="auto"></td>
					<td>
					<?php 
						if($result['p_type'] == '1'){
							echo "Featured";
						}else{
							echo "General";
						}
					?>
						
					</td>
					<td>
						<a href="editproduct.php?pid=<?php echo $result['p_id'];?>">Edit</a> || 
						<a onclick="return confirm('Are you sure want to delete data')" href="?delproduct=<?php echo $result['p_id'];?>">Delete
						</a>
					</td>
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
