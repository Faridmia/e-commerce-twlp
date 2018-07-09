<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__file__));
    include_once ($filepath.'/../classes/slider.php');
    $sd= new Slider();
?>
<?php 
    if(!isset($_GET['comid']) && $_GET['comid'] == 'null'){
        echo "<script>window.location = 'infolist.php';</script>";
    }
    else{
        $comid = $_GET['comid'];
    }
    
?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updateinfo = $sd->updateCom($_POST,$comid);
              
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Information</h2>
        <?php 
            if(isset($updateinfo)){
                echo $updateinfo;
            }
        ?>
        <div class="block sloginblock">
<?php 
    $showcom = $sd->getComData($comid);
    if($showcom){
        while ($result = $showcom->fetch_assoc()) {
            
?>                 
         <form action="" method="post">
            <table class="form">
           			
                <tr>
                    <td>
                        <label>Company Name</label>
                    </td>
                    <td>
                        <input type="text"   name="com_name" value="<?php echo $result['com_name'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>phone</label>
                    </td>
                    <td>
                        <input type="text"   name="com_phone" value="<?php echo $result['com_phone'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Fax</label>
                    </td>
                    <td>
                        <input type="text"   name="com_fax" value="<?php echo $result['com_fax'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>E-mail</label>
                    </td>
                    <td>
                        <input type="text"   name="com_email" value="<?php echo $result['email'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text"   name="com_country" value="<?php echo $result['country'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text"   name="com_facebook" value="<?php echo $result['facebook'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text"   name="com_twitter" value="<?php echo $result['twitter'];?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            
            </form>
        <?php }} ?>
    </div>
</div>
<?php include 'inc/footer.php';?>