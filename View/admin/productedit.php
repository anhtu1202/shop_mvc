<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Pms</h2>
               <div class="block copyblock"> 
                <?php 
                    if(!empty($this->dataView)){
                       $result = $this->dataView;
                 ?>     
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" value="<?php echo $result['product_name']; ?>" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>--- Select Category ---</option>
                           
                                    <option value="">
                                        
                                    </option>
                            
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
                           
                                    <option value="">
                                        
                                    </option>
                             
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="product_desc"><?php echo $result['product_desc']; ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." value="<?php echo $result['product_price']; ?>" name="product_price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img width="100" height="100" src="./uploads/<?php echo $result['product_image']; ?>">
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
                            <option <?php if ($result['product_type'] == 'Featured') {
                                echo "selected";
                            } ?> value="Featured">Featured</option>
                            <option <?php if ($result['product_type'] == 'Non-Featured') {
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
             <?php } ?>
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


