<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/category.php';
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cat_name = $_POST['cat_name'];

        $insert_cat = $cat->insert_category($cat_name);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($insert_cat)) {
                        echo $insert_cat;
                    }
                 ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>