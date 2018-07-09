<?php include_once 'inc/header.php';?>
<?php 
    $login = session::get("cmrlogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<style type="text/css">
	.payment{width:500px;min-height: 200px;border: 1px solid #ddd;margin:0 auto;text-align: center;padding:50px;}
	.payment h2{border-bottom: 1px solid #000;margin-bottom: 75px;padding-bottom: 10px;color:red;font-size: 36px;font-weight: bold;}
	.payment a {
    background: #EB390C;
    color: #fff;
    font-size: 31px;
    padding: 5px 13px;
    border-radius: 3px;
}
.back a{
	width:160px;margin:5px auto 0;padding:7px 0;font-size: 25px;display: block;border-radius: 3px;color:white!important;border:1px solid #333;background:#555;text-align: center;
}
	
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="payment">
    			<h2>Choose Payment Option</h2>
    			<a href="offlinepay.php">Offline Payment</a>
    			<a href="onlinepay.php">Online Payment</a>
    		</div>
    		<div class="back">
    			<a href="cart.php">Previous</a>
    		</div>
 				
 		</div>
 	</div>
 </div>
	<?php require_once 'inc/footer.php'; ?>