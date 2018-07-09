<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__file__));
	include_once ($filepath.'/../classes/customer.php');
?>
<?php 
    if(!isset($_GET['custId']) || $_GET['custId'] == 'NULL'){
        echo "<script>window.location = 'inbox.php';</script>";
    }
    else{
        $custId = $_GET['custId'];
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<script>window.location = 'inbox.php';</script>";
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
                
                <?php
                	$cust = new Customer(); 
                    $getcust = $cust->getCmrProfile($custId);
                    if($getcust){
                        while($result = $getcust->fetch_assoc()){

                       

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                        	<td>Name</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['cus_name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        	<td>Address</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['cus_address'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        	<td>City</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['cus_city'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        	<td>zip</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['cus_zip'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        	<td>phone</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['cus_phone'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        	<td>e-mail</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['cus_email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        	<td>country</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['cus_country'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>

