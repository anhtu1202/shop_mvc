<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">    
         <div class="block copyblock"> 
                <?php 
                    if(!empty($this->dataView['msg'])){
                ?>
                <div class="alert alert-success">
                   <?php echo $this->dataView['msg']; ?>
                </div>
            <?php } ?>           
         <form action="" method="post" class="form-group" enctype="multipart/form-data" onsubmit="return Regex()">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category" class="form-control">
                            <option>--- Select Category ---</option>
                                <?php 
                                    if(!empty($this->dataView['cat'])){
                                        foreach ($this->dataView['cat'] as $key => $valuecat) {
                                    ?>
                                    <option value="<?php echo $valuecat['cat_id']; ?>">
                                        <?php echo $valuecat['cat_name']; ?>
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
                        <select id="select" name="brand" class="form-control">
                            <option>--- Select Brand ---</option>
                                <?php 
                                    if(!empty($this->dataView['brand'])){
                                        foreach ($this->dataView['brand'] as $key => $valuebrand) {
                                 ?>
                                    <option value="<?php echo $valuecat['brand_id']; ?>">
                                        <?php echo $valuecat['brand_name']; ?>
                                    </option>
                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="product_desc" rows="5" cols="60" class="form-control"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" id="price" placeholder="Enter Price..." name="product_price" class="medium" class="form-control" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" class="form-control" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" class="form-control" name="product_type">
                            <option value="Featured">Featured</option>
                            <option value="Non-Featured">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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
<script>
    function Regex() {
        var i;
                var control = document.getElementsByClassName('form-control');
                var length = document.getElementsByClassName('form-control').length;

                for (i = 0; i < length; i++) {
                    var data = control[i].value;
                    if (data == ''){
                        alert('Bạn cần nhập đầy đủ giá trị!');
                        return false;
                    }
                }

                var product_name = document.getElementById('product_name').value;
                var price = document.getElementById('price').value;
                if (!isNaN(product_name)) {
                    alert('Hãy nhập tên sản phẩm dạng chuỗi');
                     return false;
                } else if (isNaN(price)) {
                    alert('Hãy nhập price dạng số');
                    return false;
                }
    }
</script>
<?php require_once 'Incad/footer.php';?>



