<?php 

include("phpFiles/selectData.php");

$jsonShopOwnerDataString = getJSONFromDB("SELECT * FROM shopowner"); 
$shopOwnerData = json_decode($jsonShopOwnerDataString);


?>
<script>
xmlhttp = new XMLHttpRequest();
	function update(email,status){
		//alert(email);
    xmlhttp.onreadystatechange = function() {
        
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
            var i=xmlhttp.responseText;
            if(i=="success")
                location.reload();
			else
				alert("Update Failed");
        }
    };
    var url="phpFiles/shopPendingUpdate.php?email="+email+"&status="+status;
    //alert(url);
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
	}
</script>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebTechnology Final Project</title>
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo-color" href="index.php">
                    Logo Goes Here
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger">3</span><i class="fa fa-envelope fa-3x"></i>
                    </a>
                    <!-- dropdown-messages -->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="message-reply.html">
                                <div>
                                    <strong><span class=" label label-danger">Faisal</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>1 minutes ago</em>
                                    </span>
                                </div>
                                <div>How can I help you?</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="message-reply.html">
                                <div>
                                    <strong><span class=" label label-info">Tuhin</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>5 hours ago</em>
                                    </span>
                                </div>
                                <div>How can I help you?</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="message-reply.html">
                                <div>
                                    <strong><span class=" label label-success">Sarwar</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>How can I help you?</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="message.html">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-messages -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning">2</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown Notifications-->
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="notification.html">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>Help Request Sent Successfully
                                    <span class="pull-right text-muted small"> 1 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="notification.html">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>Tuhin Accept Your Request
                                    <span class="pull-right text-muted small"> 0 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="notification.html">
                                <strong>See All Notifications</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-Notifications -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.html"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="setting.html"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../login.html"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-info">
                                <div><strong>Admin</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <hr>

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Home</a>
                    </li>
                    <li  class="selected" >
                        <a href="shopOwnerList.php"><i class="fa fa-ship fa-fw"></i>Shop Owner List</a>
                    </li>
                    <li>
                        <a href="carOwnerList.php"><i class="fa fa-car fa-fw"></i>Car Owner List</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper" style="background-color: #FFFFFF;">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Shop Owner List</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                     <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#active_list">Active</a></li>
                        <li><a data-toggle="tab" href="#pending_list">Pending</a></li>
                        <li><a data-toggle="tab" href="#disabled_list">Disabled</a></li>
                    </ul>

                      <div class="tab-content">
                        <div id="active_list" class="tab-pane fade in active">
                           
                           <table class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>Shop Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
									<?php
										for($i=0;$i<sizeof($shopOwnerData);$i++){
											if($shopOwnerData[$i]->Status=="Active"){
									?>
										<tr>
											<td><?php echo $shopOwnerData[$i]->ShopName; ?></td>
											<td><?php echo $shopOwnerData[$i]->Email; ?></td>
											<td><button type="button" class="btn btn-info"  onclick="update('<?php echo $shopOwnerData[$i]->Email; ?>','disable')">Disable</button> <button type="button" class="btn btn-danger"  onclick="update('<?php echo $shopOwnerData[$i]->Email; ?>','remove')">Delete</button></td>
										</tr>
									<?php
											}
										}
									?>
                                </tbody>
                            </table>
                        </div>
                        <div id="pending_list" class="tab-pane fade">
                           <table class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>Shop Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
										for($i=0;$i<sizeof($shopOwnerData);$i++){
											if($shopOwnerData[$i]->Status=="Pending"){
									?>
										<tr>
											<td><?php echo $shopOwnerData[$i]->ShopName; ?></td>
											<td><?php echo $shopOwnerData[$i]->Email; ?></td>
											<td><button type="button" class="btn btn-success" onclick="update('<?php echo $shopOwnerData[$i]->Email; ?>','active')">Activate</button></td>
										</tr>
									<?php
											}
										}
									?>
                                </tbody>
                            </table>
                        </div>
                        <div id="disabled_list" class="tab-pane fade">
                          <table class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>Shop Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
										for($i=0;$i<sizeof($shopOwnerData);$i++){
											if($shopOwnerData[$i]->Status=="Disable"){
									?>
										<tr>
											<td><?php echo $shopOwnerData[$i]->ShopName; ?></td>
											<td><?php echo $shopOwnerData[$i]->Email; ?></td>
											<td><button type="button" class="btn btn-success" onclick="update('<?php echo $shopOwnerData[$i]->Email; ?>','active')">Activate</button></td>
										</tr>
									<?php
											}
										}
									?>
                                </tbody>
                            </table>
                        </div>

                      </div>
                </div>
            </div>
        </div>

    </div>
    <script src="../assets/plugins/jquery-1.10.2.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
     

</body>

</html>
