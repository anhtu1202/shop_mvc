<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
   

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
<?php require_once 'Incad/footer.php';?>