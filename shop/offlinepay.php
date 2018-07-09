<?php include_once 'inc/header.php';?>
<?php 
    $login = session::get("cmrlogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<?php
    if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
        $cmrId = session::get("cmrid");
        echo $orderProduct = $ct->orderProduct($cmrId);
        $Deldata = $ct->delcustomerCart();
        header("Location:paymentsuccess.php");
    }
?>
<style type="text/css">
    .division{width:50%;float:left;}
    .tblone{width:500px;margin:0 auto;border:1px solid #ddd;}
    .tblone tr td{text-align: justify;}
    .tblone tr td a{color:green;font-weight: bold;font-size: 24px;}
    .tblone h2{color:green;font-size: 36px;font-weight: bold;}
    .tbltwo{
        float:right;text-align: left;border:2px solid #ddd;margin-right: 14px;margin-top: 12px;width:70%;
    }
    .tbltwo tr td{text-align: justify;padding:5px 10px;}
    .ordernow{padding-bottom: 30px;}
    .ordernow a{width:200px;background: #ff0000;margin:20px auto 0;text-align: center;font-size: 30px;color:#fff;display: block;border-radius: 3px;}
	
	
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="division">
                <table class="tblone">
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            <?php 
                                $getcart = $ct->getcartProduct();
                                if($getcart){
                                    $i = 0;
                                    $sum = 0;
                                    $qty = 0;

                                    while($result = $getcart->fetch_assoc()){
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['p_name'];?></td>
                                <td>Tk. <?php echo $result['price'];?></td>
                                <td><?php echo $result['quenty'];?></td>
                                <td>Tk. <?php 
                                    $total = $result['price'] * $result['quenty'];
                                    echo $total;
                                ?></td>
                            </tr>
                            <?php  
                                $qty = $qty + $result['quenty'];
                                $sum = $sum + $total;
                                
                            ?>
                            <?php }} ?>
                        </table>
                        <table class="tbltwo">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>$ <?php echo $sum;?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>10% ($<?php echo $vat = $sum * 0.10;?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>
                                    <?php 
                                        $vat = $sum * 0.10;
                                        $gtotal = $sum + $vat;
                                        echo $gtotal." Tk";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td> <?php echo $qty;?></td>
                            </tr>
                       </table>
            </div>
            <div class="division">
                <?php 
                    $id = session::get("cmrid");
                    $getData = $cmr->getCmrProfile($id);
                    if($getData){
                        while($data = $getData->fetch_assoc()){
                ?>
                        <table class="tblone">
                            <tr>
                                
                                <td colspan="3"><h2>Your Profile Details</h2></td>
                            </tr>
                            <tr>
                                <td width="20%">Name</td>
                                <td width="5%">:</td>
                                <td><?php echo $data['cus_name'];?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><?php echo $data['cus_phone'];?></td>
                            </tr>
                            <tr>
                                <td>E-Mail</td>
                                <td>:</td>
                                <td><?php echo $data['cus_email'];?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?php echo $data['cus_address'];?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>:</td>
                                <td><?php echo $data['cus_city'];?></td>
                            </tr>
                            <tr>
                                <td>Zip Code</td>
                                <td>:</td>
                                <td><?php echo $data['cus_zip'];?></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>:</td>
                                <td><?php echo $data['cus_country'];?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><a href="editprofile.php">Update Details</a></td>
                            </tr>
                            
                        </table>
                        <?php } } ?>
            </div>
 				
 		</div>
 	</div>
    <div class="ordernow"><a href="?orderid=order">Order Now</a></div>
 </div>
	<?php require_once 'inc/footer.php'; ?>