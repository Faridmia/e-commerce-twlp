<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__file__));
    include_once ($filepath.'/../classes/slider.php');
    $sd= new Slider();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
<?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $sliderData = $sd->addSlider($_POST,$_FILES);
              
            }
        
?>
    <div class="block"> 
        <?php 
            if(isset($sliderData)){
                echo $sliderData;
            }
        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Slider Title</label>
                    </td>
                    <td>
                        <input type="text" name="slider_title" class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Slider link</label>
                    </td>
                    <td>
                        <input type="text" name="slider_link" class="medium" />
                    </td>
                </tr>            
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="slider_image"/>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add Slider" />
                    </td>
                </tr>
            </table>
            </form>
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