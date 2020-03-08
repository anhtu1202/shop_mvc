<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Customer</h2>
               <div class="block copyblock"> 
                 <?php 
                    if(!empty($this->dataView)){
                        $result = $this->dataView;
                    ?>
                    <table class="form">                    
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="" class="medium" value="<?php echo $result['name']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="" class="medium" value="<?php echo $result['phone']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="" class="medium" value="<?php echo $result['address']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="" class="medium" value="<?php echo $result['email']; ?>" />
                            </td>
                        </tr>
                    </table>
                    
                <?php } ?>    
                </div>
            </div>
        </div>
<?php 
        require_once 'Incad/footer.php'; 
?>  

