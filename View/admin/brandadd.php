<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/category.php';
    include '../classes/brand.php';
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $brand_name = $_POST['brand_name'];
        $category = $_POST['category'];
        $insert_brand = $brand->insert_brand($brand_name,$category);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($insert_brand)) {
                        echo $insert_brand;
                    }
                 ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Brand :</label>
                                <input type="text" name="brand_name" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category :</label>
                                <select name="category">
                                    <?php 
                                    $cat = new category();
                                    $show_cat = $cat->show_category();
                                    if (isset($show_cat)) {
                                        $i = 0;
                                        while ($result = $show_cat->fetch_assoc()) {
                                        $i++;
                                 ?>
                                    <option value="<?php echo $result['cat_id']; ?>">
                                        <?php echo $result['cat_name']; ?>
                                    </option>
                                <?php }} ?>
                                </select>
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