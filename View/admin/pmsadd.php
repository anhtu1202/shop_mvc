<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Pms</h2>
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
                                <input type="text" id="pms" name="pms" placeholder="Enter Category Pms..." class="medium" />
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
            var pms = document.getElementById('pms').value;
            if (!pms) {
                alert( 'Hãy nhập đầy đủ dữ liệu' );
                return false;
            } else if (!isNaN(pms)) {
                alert('Hãy nhập dữ liệu dạng chuỗi');
                return false;
            }
        }
</script>
<?php require_once 'Incad/footer.php';?>