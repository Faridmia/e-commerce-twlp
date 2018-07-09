
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
    if(!isset($_GET['bid']) || $_GET['bid'] == 'NULL'){
        echo "<script>window.location = 'brandlist.php';</script>";
    }
    else{
        $bid = $_GET['bid'];
    }
    $brand = new brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $b_name   = $_POST['b_name'];
        $updatebrand = $brand->BrandUpdate($b_name,$bid);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
               <div class="block copyblock"> 
                <?php
                    if(isset($updatebrand)){
                        echo $updatebrand;
                    }
                ?>
                <?php 
                    $getbrand = $brand->getbrandById($bid);
                    if($getbrand){
                        while($result = $getbrand->fetch_assoc()){

                       

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="b_name" value="<?php echo $result['b_name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="BrandUpdate" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>