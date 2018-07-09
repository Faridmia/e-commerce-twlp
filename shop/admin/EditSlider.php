<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__file__));
    include_once ($filepath.'/../classes/slider.php');
    $sd= new Slider();
?>
<?php 
    if(!isset($_GET['sliderId']) && $_GET['sliderId'] == 'null'){
        echo "<script>window.location = 'sliderlist.php';</script>";
    }
    else
    {
        $sliderid = $_GET['sliderId'];
    }

?>



<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Slider</h2>
<?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $sliderid = $_GET['sliderId'];
                $sliderupdate = $sd->updateSlider($_POST,$sliderid);
              
            }
        
?>
    <div class="block"> 
        <?php 
            if(isset($sliderData)){
                echo $sliderData;
            }
        ?>
         <?php 
            if(isset($sliderupdate)){
                echo $sliderupdate;
            }
        ?>
        
<?php 
     $getData = $sd->sliderShowData($sliderid);
     if($getData){
        while ($data = $getData->fetch_assoc()) {
       

?>
                
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Slider Title</label>
                    </td>
                    <td>
                        <input type="text" name="slider_title" value="<?php echo $data['slider_title'];?>" class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Slider link</label>
                    </td>
                    <td>
                        <input type="text" name="slider_link" value="<?php echo $data['slider_link'];?>" class="medium" />
                    </td>
                </tr>            
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/slider/<?php echo $data['slider_image'];?>" width="150px" height="auto"><br/><br/>
                        <input type="file" name="slider_image"/>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update Slider" />
                    </td>
                </tr>
            </table>
            </form>
            <?php }} ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>