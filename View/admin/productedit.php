<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/category.php';
    include '../classes/brand.php';
    include '../classes/product.php';
    $product = new Product();
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
    }else{
        echo "<script>window.location = 'productlist.php';</script>";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $update_product = $product->update_product($_POST,$_FILES,$product_id);
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">    
        <?php 
                    if (isset($update_product)) {
                        echo $update_product;
                    }

                    $get_edit_product = $product->get_edit_product($product_id);
                    if (isset($get_edit_product)) {
                        while ($resultp = $get_edit_product->fetch_assoc()) {
                 ?>           
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" value="<?php echo $resultp['product_name']; ?>" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>--- Select Category ---</option>
                            <?php 
                                    $cat = new category();
                                    $show_cat = $cat->show_category();
                                    if (isset($show_cat)) {
                                        while ($result = $show_cat->fetch_assoc()) {
                                 ?>
                                    <option <?php 
                                        if ($resultp['cat_id'] == $result['cat_id']) {
                                            echo "selected";
                                        }
                                     ?>
                                     value="<?php echo $result['cat_id']; ?>">
                                        <?php echo $result['cat_name']; ?>
                                    </option>
                                <?php }} ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>--- Select Brand ---</option>
                            <?php 
                                    $brand = new Brand();
                                    $show_brand = $brand->show_brand();
                                    if (isset($show_brand)) {
                                        while ($resultb = $show_brand->fetch_assoc()) {
                                 ?>
                                    <option <?php if ($resultp['brand_id'] == $resultb['brand_id']) {
                                        echo "selected";
                                    } ?>
                                     value="<?php echo $resultb['brand_id']; ?>">
                                        <?php echo $resultb['brand_name']; ?>
                                    </option>
                                <?php }} ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="product_desc"><?php echo $resultp['product_desc']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." value="<?php echo $resultp['product_price']; ?>" name="product_price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img width="100" height="100" src="./uploads/<?php echo $resultp['product_image']; ?>">
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="product_type">
                            <option>--- Select Type ---</option>
                            <option <?php if ($resultp['product_type'] == 'Featured') {
                                echo "selected";
                            } ?> value="Featured">Featured</option>
                            <option <?php if ($resultp['product_type'] == 'Non-Featured') {
                                echo "selected";
                            } ?> value="Non-Featured">Non-Featured</option>
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


