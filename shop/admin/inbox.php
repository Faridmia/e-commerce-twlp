<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
	$filepath = realpath(dirname(__file__));
	include_once ($filepath.'/../classes/cart.php');
	$ct = new Cart();
	$fm = new Format();
?>
<?php 
	if(isset($_GET['shiftId'])){
		$id = $_GET['shiftId'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$shifted = $ct->shiftProduct($id,$price,$time);
	}
	if(isset($_GET['delId'])){
		$id = $_GET['delId'];
		$price = $_GET['price'];
		$time = $_GET['time'];
		$deleteOrder = $ct->deleteOrder($id,$price,$time);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
                	if(isset($shifted)){
                		echo $shifted;
                	}
                ?>
                <?php 
                	if(isset($deleteOrder)){
                		echo $deleteOrder;
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Order Time</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cust Id</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							
							$order = $ct->getAllorderProduct();
							if($order){
								$i = 0;
								while($orderpro = $order->fetch_assoc()) { 
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $fm->formatDate($orderpro['dateinsert']);?></td>
							<td><?php echo $orderpro['p_name'];?></td>
							<td><?php echo $orderpro['quantity'];?></td>
							<td>$
								<?php 
									$vat = $orderpro['price'] * 0.1;
									$total = $orderpro['price'] + $vat;
									echo $total;

								?>
							
							</td>
							<td><?php echo $orderpro['cmr_id'];?></td>
							<td><a href="customer.php?custId=<?php echo $orderpro['cmr_id'];?>">View Details</a></td>
							<?php if($orderpro['status'] == '0') {?>
							<td><a href="?shiftId=<?php echo $orderpro['cmr_id'];?>&price=<?php echo $orderpro['price']; ?>&time=<?php echo $orderpro['dateinsert'];?>">Shifted</a>
							<?php } elseif($orderpro['status'] == '1'){ ?>
							<td>Pending</td>
							<?php } else{?>
							<td><a href="?delId=<?php echo $orderpro['cmr_id'];?>&price=<?php echo $orderpro['price']; ?>&time=<?php echo $orderpro['dateinsert'];?>">Remove</a></td>
							<?php }?>

							
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
