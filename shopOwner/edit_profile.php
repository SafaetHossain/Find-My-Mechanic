<?php session_start();
    require "shopOwnerPHP/selectFromDatabase.php"; 

    $jsonShopOwnerString = getJSONFromDB("select * from shopowner WHERE Email='".$_SESSION["shopOwnerEmail"]."'");
    //echo $_SESSION["shopOwnerEmail"];

    $shopOwnerData = json_decode($jsonShopOwnerString);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        require "shopOwnerPHP/updateDatabase.php";

        if (!empty($_POST['ShopName']) && !empty($_POST['Contact']) && !empty($_POST['ShopTradeLicence']) && !empty($_POST['Latitude']) && !empty($_POST['Longitude']) && !empty($_POST['Location']) && !empty($_POST['Email']))

        {
          $shopName         = $_POST['ShopName'];
          $shopEmail        = $_POST['Email'];
          $contact          = $_POST['Contact'];    
          $shopTradeLicence = $_POST['ShopTradeLicence'];  
          $latitude         = $_POST['Latitude'];   
          $longitude        = $_POST['Longitude'];
          $location         = $_POST['Location'];


        }
       

        $sql = "UPDATE shopowner SET ShopName ='".$shopName."', Email='".$shopEmail."', Contact='".$contact."',Latitude = '".$latitude."',Longitude='".$longitude."',Address ='".$location."',ShopTradeLicence='".$shopTradeLicence."' WHERE Email='".$_SESSION["shopOwnerEmail"]."'";
        /*$sqlRelationService="UPDATE shopservicerelation SET ShopEmail='".$shopEmail."' WHERE ShopEmail= '".$_SESSION["shopOwnerEmail"]."'";
        $sqlRelationStock="UPDATE shopstockrelation SET ShopEmail='".$shopEmail."' WHERE ShopEmail= '".$_SESSION["shopOwnerEmail"]."'";*/
        
        if (updateDB($sql)) {
            header("Refresh:0");
            //updateDB($sqlRelation);
            $_SESSION["shopOwnerEmail"]=$shopEmail;
        } else {
            $info = 
            '<div class="alert alert-info alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong> Updated Failed.
             </div>';
        }
    }

?>

<script type="text/javascript">
xmlhttp = new XMLHttpRequest();
    function emailcheckfunction(id){ //check email operation
        //alert(id);
        str=document.getElementById(id).value;
        //alert(str);

    xmlhttp.onreadystatechange = function() {
        
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            m=document.getElementById("emailcheck");
            var i=xmlhttp.responseText;
            //alert(i);
            if(i==str){
                m.innerHTML="*Email Already Exists!"
                m.style.color="red";
            }
            else{
                m.innerHTML=""
            }
        }
    };
    var url="shopOwnerPHP/emailCheckAJAX.php?email="+str;
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
    <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
   </head>
<body <?php $info=''; ?> >
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
            <?php include("TemplateFile/messageTemplate.php"); ?>
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
                                <div><?php echo $shopOwnerData[0]->ShopName; ?></div>
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
                    <li>
                        <a href="message.php"><i class="fa fa-comment fa-fw"></i>Messages</a>
                    </li>
                    <li>
                        <a href="notification.php"><i class="fa fa-bell fa-fw"></i>Notification</a>
                    </li>
                    <li>
                        <a href="entry.php"><i class="fa fa-edit fa-fw"></i>Available Stock</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
         
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                </div>
                <!--End Page Header -->
            </div>
            <div class="cow">
                <div class="col-lg-12">
                     <?php echo $info ; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-pencil-square-o fa-fw"></i> Edit Profile  
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                         <form class="form-horizontal" action="" method="post">
                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="name">Shop Name:</label>
                                                <div class="col-sm-5">
                                                  <input type="text" class="form-control" id="name" name="ShopName" placeholder="" value="<?php echo $shopOwnerData[0]->ShopName; ?>">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">Email:</label>
                                                <div class="col-sm-5">
                                                  <input type="text" class="form-control" id="email" name="Email" placeholder="" value="<?php echo $shopOwnerData[0]->Email; ?>" onkeyup="emailcheckfunction('email')"> <span id="emailcheck"></span>
                                                </div>
                                              </div>
                                    
                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="contact">Contact:</label>
                                                <div class="col-sm-5">
                                                  <input type="text" class="form-control" id="contact" name="Contact" placeholder="" value="<?php echo $shopOwnerData[0]->Contact; ?>">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="shoptradeLicence">Shop Trade Licence:</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="shoptradeLicence" name="ShopTradeLicence" placeholder="" value="<?php echo $shopOwnerData[0]->ShopTradeLicence; ?>" required="">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="maps_latitude">Google Maps Latitude:</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="maps_latitude" name="Latitude" placeholder="" value="<?php echo $shopOwnerData[0]->Latitude; ?>" required="">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="maps_longitude">Google Maps Longitude:</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="maps_longitude" name="Longitude" placeholder="" value="<?php echo $shopOwnerData[0]->Longitude; ?>" required="">
                                                </div>
                                              </div>

                                              <input type="hidden" class="form-control" id="Hidden_Shop_Email" name="HiddenEmail" placeholder="" value="<?php echo $shopOwnerData[0]->Email; ?>" required="">

                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="address">Location:</label>
                                                <div class="col-sm-5">
                                                   <textarea class="form-control" id="address" name="Location" required=""><?php echo $shopOwnerData[0]->Address; ?></textarea>
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-2">
                                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                              </div>
                                         </form>
                                         <div class="col-sm-2">
                                                  <a href="profile.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                                         </div>
                                         
                                    </div>

                                </div>

                            </div>
                            <!-- row -->
                        </div>
                        <!-- panel-body -->
                    </div>
                    <!--End simple table example -->
                </div>  
            </div>
            
             
             
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <script src="../assets/plugins/jquery-1.10.2.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
     
</body>

</html>
