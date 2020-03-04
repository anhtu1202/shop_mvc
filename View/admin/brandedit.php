<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>
               <div class="block copyblock"> 
               <?php 
                    if(!empty($this->dataView)){
                     $result = $this->dataView['brand'];

                 ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Brand :</label>
                                <input type="text" name="brand_name" placeholder="Enter Brand Name..." class="medium" value="<?php echo $result['brand_name']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category :</label>
                                <select name="category">
                                     <?php 
                            if(!empty($this->dataView)){

                            foreach ($this->dataView['cat'] as $key=> $resultcat) {

                        ?>          
                                   
                                   
                                    <option value="<?php echo $result['cat_id']; ?>" 
                                        <?php if($result['cat_id']==$resultcat['cat_id']){
                                            echo "selected";        }
                                     ?>>
                                        <?php echo $resultcat['cat_name']; ?>

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
                <?php } ?>
                </div>
            </div>
        </div>
<?php require_once 'Incad/footer.php';?>