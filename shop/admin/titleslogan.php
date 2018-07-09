<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__file__));
    include_once ($filepath.'/../classes/slider.php');
    $sd= new Slider();
?>
<?php 
    $getlogo = $sd->getLogoData();
?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $logoData = $sd->updateLogo($_POST,$_FILES);
              
    }
?>
<style>
        .leftside{
            float:left;
            width:70%;
        }
        .rightside{float:left;width:20%;}
        .rightside img{width:60px;height:70px;}
    </style>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php 
            if(isset( $logoData)){
                echo $logoData;
            }
        ?>
        <div class="block sloginblock">
        
    <div class="leftside">
     <?php 
                if($getlogo){
                    while($result = $getlogo->fetch_assoc()){

                    
            ?>                     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
           			
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text"   name="title" value="<?php echo $result['logo_title'];?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Logo Image</label>
                    </td>
                    <td>
                       
                        <input type="file" name="logo_image">
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
        </div>
        <div class="rightside">
             <img src="upload/logo/<?php echo $result['logo_image'];?>" width="200px" height="auto">
        <?php }} ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>