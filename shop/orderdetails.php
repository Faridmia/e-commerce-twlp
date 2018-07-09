<?php require_once 'inc/header.php'; ?>
<?php 
    $login = session::get("cmrlogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<?php 
    if(isset($_GET['confirmId'])){
        $id = $_GET['confirmId'];
        $price = $_GET['price'];
        $time = $_GET['time'];
        $confirm = $ct->confirmOrder($id,$price,$time);
    }
?>
	<style type="text/css">
		.notfound{}
		.notfound h2{font-size: 100px;line-height:130px;text-align: center; }
		.notfound h2 span{display: block;color:red;font-size: 170px;}
        .tblone tr td{text-align: justify;}
	</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="order">
    			<h2>Your Ordered Details....</h2>
                <table class="tblone">
                            <tr><th>SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                                $cmrId = session::get("cmrid");
                                $getorder = $ct->getOrdertProduct($cmrId);
                                if($getorder){
                                    $i = 0;

                                    while($result = $getorder->fetch_assoc()){
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $result['p_name'];?></td>
                                <td><img src="admin/upload/product/<?php echo $result['image']?>" width='200px' height='auto' alt=""/></td>
                                <td><?php echo $result['quantity'];?></td>
                                <td>Tk. 
                                <?php
                                    $vat   = $result['price'] * 0.1; 
                                    $total = $result['price'] + $vat;
                                    echo $total;
                                ?></td>
                                <td><?php echo $fm->formatDate($result['dateinsert']);?></td>
                                <td>
                                <?php 
                                    if($result['status'] == '0'){
                                        echo "Pending";
                                    }
                                    elseif($result['status'] == '1'){ 
                                        echo "shifted";
                                        
                                   } else{ 
                                        echo "Ok";
                                     }
                                    ?>

                                
                                    
                                </td>
                                <?php if($result['status'] == '1') { ?>
                                    <td><a href="?confirmId=<?php echo $cmrId;?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['dateinsert'];?>">confirm</a></td> 
                               <?php }elseif($result['status'] == '2'){ ?>
                                <td>Ok</td> 
                               <?php } elseif($result['status'] == '0'){?>
                                <td>N/A</td>
                               <?php } ?>
                            </tr>
                           
                            <?php }} ?>
                        </table>
    		</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
<?php require_once 'inc/footer.php'; ?>

