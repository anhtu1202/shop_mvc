<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
   

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                <div class="block copyblock"> 
                <?php 
                    if(!empty($this->dataView['msg'])){
                ?>
                <div class="alert alert-success">
                   <?php echo $this->dataView['msg']; ?>
                </div>
            <?php } ?>
                 <form action="" method="post" onsubmit="return Regex()">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Brand :</label>
                                <input type="text" id="brand_name" name="brand_name" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category :</label>
                                <select name="category">
                                   <?php 
                            if(!empty($this->dataView)){

                            foreach ($this->dataView['cat'] as $key=> $result) {

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
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<script>
    function Regex() {
            var brand_name = document.getElementById('brand_name').value;
            if (!brand_name) {
                alert( 'Hãy nhập đầy đủ dữ liệu' );
                return false;
            } else if (!isNaN(brand_name)) {
                alert('Hãy nhập dữ liệu dạng chuỗi');
                return false;
            }
        }
</script>
<?php require_once 'Incad/footer.php';?>