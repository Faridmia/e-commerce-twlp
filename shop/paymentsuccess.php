<?php include_once 'inc/header.php';?>
<?php 
    $login = session::get("cmrlogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<style type="text/css">
	.successpay{width:500px;min-height: 200px;border: 1px solid #ddd;margin:0 auto;text-align: center;padding:20px;}
	.successpay h2{border-bottom: 1px solid #000;margin-bottom: 25px;padding-bottom: 10px;color:red;font-size: 36px;font-weight: bold;}
    .successpay p {
    line-height: 25px;
    font-size: 18px;
    text-align: left;
}
	
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="successpay">
    			<h2>success</h2>
                <?php 
                    $cmrId = session::get("cmrid");
                    $Amount = $ct->paymentAmount($cmrId);
                    if($Amount){
                        
                      $sum = 0;
                        while ($result = $Amount->fetch_assoc()){
                            $price = $result['price'];
                           $sum    = $sum+$price;

                        }
                    }

                ?>
                <p>
                    Total Payable Amount(Including Vat) : $
                     <?php 
                        $vat = $sum * 0.1;
                        $total = $sum+$vat;
                        echo $total;
                    ?>
                        
                    </p>
                <p>Thanks for Purchase. Receive Your order Successfully. We will Contact You ASAP with delivery details. Here is your order details....<a href="orderdetails.php">Visit Here....</a></p>
    		</div>
 				
 		</div>
 	</div>
 </div>
	<?php require_once 'inc/footer.php'; ?>