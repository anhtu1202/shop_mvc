<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="Cssad/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="Cssad/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="Cssad/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="Cssad/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="Cssad/nav.css" media="screen" />
    <link href="Cssad/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="Jsad/jquery-1.6.4.min.js" type="text/javascript"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script type="text/javascript" src="Jsad/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="Jsad/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="Jsad/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="Jsad/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="Jsad/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="Jsad/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="Jsad/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="Jsad/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="Jsad/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="Uploads/logo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>CHIPS</h1>
					<p>www.CHIPS.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php 
                                if (isset($_SESSION['auth']['name'])) {
                                    echo $_SESSION['auth']['name'];
                                }
                             ?></li>
                            <li><a href="?act=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href=""><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href="<?php echo base_path; ?>"><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>