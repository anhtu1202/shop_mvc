<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/product.php';
    $pro = new Product();
    if (isset($_GET['slide_id'])) {
        $slide_id = $_GET['slide_id'];
    }else{
        echo "<script>window.location = 'productlist.php';</script>";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $update_slide = $pro->update_slide($_POST,$_FILES,$slide_id);
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">    
        <?php 
                    if (isset($update_slide)) {
                        echo $update_slide;
                    }

                    $get_edit_slide = $pro->get_edit_slide($slide_id);
                    if (isset($get_edit_slide)) {
                        while ($result = $get_edit_slide->fetch_assoc()) {
                 ?>           
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" value="<?php echo $result['slide_name']; ?>" placeholder="Enter Slider Name..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img width="100" height="100" src="./uploads/<?php echo $result['slide_image']; ?>">
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Slider Type</label>
                    </td>
                    <td>
                        <select id="select" name="slide_type">
                            <option>--- Select Type ---</option>
                            <option <?php if ($result['slide_type'] == '0') {
                                echo "selected";
                            } ?> value="0">ON</option>
                            <option <?php if ($result['slide_type'] == '1') {
                                echo "selected";
                            } ?> value="1">OFF</option>
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


