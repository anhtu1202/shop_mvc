<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Cập nhật quyền: </h2>
                <div class="block">  
					    <table class="data display datatable" id="example">
					    	<thead>
								<tr>
									<th>Serial No.</th>
									<th>Người được cấp action</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$role_pms = $this->dataView['role_pms'];
							foreach ($role_pms as $key => $value_rp) {
							 ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value_rp['name_role']; ?></td>
								<td><?php echo $value_rp['name_pms']; ?></td>
							</tr>
						<?php } ?>
							</tbody>
						</table>
						<?php
								if ($data = $this->dataView['msg']) {
									echo $data;
								}
							 ?>
					<form action="" method="post" class="form-group">
						<select name="role" class="form-control" id="">
							<?php
								$role = $this->dataView['role'];
							foreach ($role as $key => $value) {
								?>
							 ?>
							<option <?php if ($value['id'] == 1) {
								echo "disabled";
							} ?> value="<?php echo $value['id']; ?>"><?php echo $value['name_role']; ?></option>
						<?php } ?>
						</select>
						<br>
						<select name="pms" class="form-control" id="">
							<?php
								$role = $this->dataView['pms'];
							foreach ($role as $key => $value) {
								?>
							 ?>
							<option value="<?php echo $value['id']; ?>"><?php echo $value['name_pms']; ?></option>
						<?php } ?>
						</select>
						<input type="submit" name="submit" class="btn btn-primary m-2" id="" value="Cập nhật">
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
<?php require_once 'Incad/footer.php';?>

