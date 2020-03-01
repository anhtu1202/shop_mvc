<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../classes/customer.php');
    require_once ($filepath.'/../helper/format.php');

    if (isset($_GET['customer_id'])) {
    $id = $_GET['customer_id'];
    }else{
        echo "<script>window.location = 'inbox.php';</script>";
    }
    $cus = new customer();
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $cat_name = $_POST['cat_name'];
    //     $update_cat = $cat->update_category($cat_id,$cat_name);
    // }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View Customer</h2>
               <div class="block copyblock"> 
                 <?php 
                    $show_customer = $cus->show_customer($id);
                    if (isset($show_customer)) {
                        while ($result = $show_customer->fetch_assoc()) {
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
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="" class="medium" value="<?php echo $result['city']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="" class="medium" value="<?php echo $result['country']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zip_code</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="" class="medium" value="<?php echo $result['zipcode']; ?>" />
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
                    
                <?php }} ?>    
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>