
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $b_name = $_POST['b_name'];
        $brandinsert = $brand->brandInsert($b_name);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                <?php
                    if(isset($brandinsert)){
                        echo $brandinsert;
                    }
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="b_name" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Addbrand" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>