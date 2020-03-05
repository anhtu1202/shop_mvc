<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
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
                                <input type="text" id="cat_name" name="cat_name" placeholder="Enter Category Cat..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" id="save" name="submit" Value="Save" />
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
            var cat_name = document.getElementById('cat_name').value;
            if (!cat_name) {
                alert( 'Hãy nhập đầy đủ dữ liệu' );
                return false;
            } else if (!isNaN(cat_name)) {
                alert('Hãy nhập dữ liệu dạng chuỗi');
                return false;
            }
        }
</script>
<?php require_once 'Incad/footer.php';?>