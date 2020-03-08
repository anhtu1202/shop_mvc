<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>User List</h2>
        <div class="block">  
            <?php 
                 if(!empty($this->dataView['msg'])){
                    echo $this->dataView['msg'];
                 }
                ?>
                   <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Chức vụ</th>
                            <th>Action</th>
                        </tr>
                    </thead>   
                    <?php 
                        if(!empty($this->dataView)){
                           foreach ($this->dataView as $key => $result) {
                    ?>               
                       <tr class="odd gradeX">
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['phone']; ?></td>
                        <td><?php echo $result['address']; ?></td>
                        <td ><?php echo $result['email']; ?></td>
                        <td><?php echo $result['name_role']; ?></td>
                        <td>
                            <?php if ($result['id_role'] != 1) {
                             ?>
                            <a href="?ct=user&act=userup&id=<?php echo $result['id']; ?>">Tăng cấp</a> || 
                            <a href="?ct=user&act=userdown&id=<?php echo $result['id']; ?>">Hạ Cấp</a>
                            <?php } ?>
                        </td>
                        </tr>
                       <?php }} ?>  
                    </table>   
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
<?php 
        require_once 'Incad/footer.php'; 
?>  

