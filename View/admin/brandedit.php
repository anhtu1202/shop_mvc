<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/brand.php';
    $brand = new Brand();
    if (isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
    }else{
        echo "<script>window.location = 'brandlist.php';</script>";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $brand_name = $_POST['brand_name'];
        $cat_id = $_POST['category'];
        $update_brand = $brand->update_brand($brand_id,$brand_name,$cat_id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($update_brand)) {
                        echo $update_brand;
                    }

                    $get_edit_brand = $brand->get_edit_brand($brand_id);
                    if (isset($get_edit_brand)) {
                        
                        while ($resultb = $get_edit_brand->fetch_assoc()) {
                 ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Brand :</label>
                                <input type="text" name="brand_name" placeholder="Enter Brand Name..." class="medium" value="<?php echo $resultb['brand_name']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category :</label>
                                <select name="category">
                                    <?php 
                                    $show_cat = $brand->show_category();
                                    if (isset($show_cat)) {
                                        $i = 0;
                                        while ($result = $show_cat->fetch_assoc()) {
                                        $i++;
                                 ?>
                                    <option <?php if ($resultb['cat_id'] == $result['cat_id']) {
                                        echo "selected";
                                    } ?> value="<?php echo $result['cat_id']; ?>">
                                        <?php echo $result['cat_name']; ?>
                                    </option>
                                <?php }} ?>
                                </select>
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