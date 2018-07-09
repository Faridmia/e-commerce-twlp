<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/category.php';?>

<?php
    if(!isset($_GET['pid']) || $_GET['pid'] == 'NULL'){
        echo "<script>window.location = 'productlist.php';</script>";
    }
    else{
        $pid = $_GET['pid'];
    } 
    $pd = new Product();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $updateproduct = $pd->ProductUpdate($_POST,$_FILES,$pid);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>

        <div class="block">
          <?php
                    if(isset($updateproduct)){
                        echo $updateproduct;
                    }
         ?> 
         <?php
            $getpro = $pd->getProById($pid);
            if($getpro){
                while($row = $getpro->fetch_assoc()){


         ?>                    
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="p_name" value="<?php echo $row['p_name'];?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="cat_id">
                            <option value="">Select Category</option>
                            <?php
                                $cat = new Category();
                                $getCat = $cat->getAllcat();
                                if($getCat){
                                while($result = $getCat->fetch_assoc()){
                            ?>
                            <option
                            <?php 
                                if($row['cat_id'] == $result['cat_id']){ ?>
                                    selected = "selected";
                               <?php } ?> value="<?php echo $result['cat_id'];?>"><?php echo $result['cat_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="b_id">
                            <option value="">Select Brand</option>
                            <?php
                                $brand = new Brand();
                                $getbrand = $brand->getAllbrand();
                                if($getbrand){
                                while($result = $getbrand->fetch_assoc()){
                            ?>
                            <option
                            <?php 
                                if($row['b_id'] == $result['b_id']){?>
                                    selected = "selected";
                               <?php } ?> value="<?php echo $result['b_id'];?>"><?php echo $result['b_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="p_des">
                            <?php echo $row['p_des'];?>

                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="p_price" value="<?php echo $row['p_price'];?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/product/<?php echo $row['p_image']; ?>" width="80px" height="auto"><br/>&nbsp;
                        <input type="file" name="p_image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="p_type">
                            <option value="">Select Type</option>
                            <?php 
                                if($row['p_type'] == 1){?>
                                    <option selected = "selected" value="1">Featured</option>
                                    <option value="2">General</option>

                                <?php } else{ ?>
                                    <option selected = "selected" value="2">General</option>
                                    <option value="1">Featured</option>

                               <?php } ?>
                            
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Updateproduct" />
                    </td>
                </tr>
            </table>
            </form>

            <?php } } ?>

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


