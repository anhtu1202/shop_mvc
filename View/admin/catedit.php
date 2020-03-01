<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/category.php';
    if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    }else{
        echo "<script>window.location = 'catlist.php';</script>";
    }
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cat_name = $_POST['cat_name'];
        $update_cat = $cat->update_category($cat_id,$cat_name);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($update_cat)) {
                        echo $update_cat;
                    }

                    $get_edit_cat = $cat->get_edit_cat($cat_id);
                    if (isset($get_edit_cat)) {
                        
                        while ($result = $get_edit_cat->fetch_assoc()) {
                 ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" value="<?php echo $result['cat_name']; ?>" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }} ?>    
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>