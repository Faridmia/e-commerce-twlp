<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__file__));
    include_once ($filepath.'/../classes/slider.php');
    $sd= new Slider();
?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $insertinfo = $sd->InsertCominfo($_POST);
              
    }
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Company Information</h2>
        <?php 
            if(isset($insertinfo)){
                echo $insertinfo;
            }
        ?>
        <div class="block sloginblock">                 
         <form action="" method="post">
            <table class="form">
           			
                <tr>
                    <td>
                        <label>Company Name</label>
                    </td>
                    <td>
                        <input type="text"   name="com_name" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>phone</label>
                    </td>
                    <td>
                        <input type="text"   name="com_phone" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Fax</label>
                    </td>
                    <td>
                        <input type="text"   name="com_fax" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>E-mail</label>
                    </td>
                    <td>
                        <input type="text"   name="com_email" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Country</label>
                    </td>
                    <td>
                        <input type="text"   name="com_country" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text"   name="com_facebook" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text"   name="com_twitter" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Send Info" />
                    </td>
                </tr>
            </table>
            
            </form>
    </div>
</div>
<?php include 'inc/footer.php';?>