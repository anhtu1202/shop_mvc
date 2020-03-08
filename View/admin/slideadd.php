<?php require_once 'Incad/header.php';?>
<?php require_once 'Incad/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
        <div class="block">    
            <?php 
                    if(!empty($this->dataView['msg'])){
                        echo $this->dataView['msg'];
                    }
                ?>       
<form action="" method="post" class="form-group" enctype="multipart/form-data" onsubmit="return Regex()">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" id="slide_name" name="slide_name" class="form-control" placeholder="Enter Slider Name..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" class="form-control" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" class="form-control" name="slide_type">
                            <option>--- Select Type ---</option>
                            <option value="0">ON</option>
                            <option value="1">OFF</option>
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

                var slide_name = document.getElementById('slide_name').value;
                if (!isNaN(slide_name)) {
                    alert('Hãy nhập tên slide dạng chuỗi');
                     return false;
                }
    }
</script>
<?php require_once 'Incad/footer.php';?>


