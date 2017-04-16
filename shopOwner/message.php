<!DOCTYPE html>
<html>
<?php session_start();
    require("shopOwnerPHP/selectFromDatabase.php");
    require("shopOwnerPHP/updateDatabase.php");

    $jsonOutboxString = getJSONFromDB("SELECT (SELECT name FROM carowner where Email=message.ReceiverMail) AS name,Date,MessageBody,Status FROM message WHERE SenderMail='".$_SESSION["shopOwnerEmail"]."'  ORDER BY Date DESC"); //outbox messages
    
    $outboxMessageData = json_decode($jsonOutboxString);

    if(isset($_POST['send']) && $_POST['reply']!="" && $_SERVER["REQUEST_METHOD"] == "POST"){
        $reply=$_POST['reply'];           //message body
        $sendermail=$_POST['SenderMail'];

        $sql="INSERT INTO message(SenderMail, ReceiverMail, MessageBody, Date, Status) VALUES ('".$_SESSION["shopOwnerEmail"]."','".$sendermail."','".$reply."','".date("Y-m-d")."','unread')";
        if(updateDB($sql)==1)
            header("Refreash:0");
    }

    $jsonShopOwnerString = getJSONFromDB("SELECT ShopName FROM shopowner WHERE Email='".$_SESSION["shopOwnerEmail"]."'");

    $jsonShopOwnerData = json_decode($jsonShopOwnerString);
?>
<head>
    <?php include("TemplateFile/head.php"); ?>

    <script type="text/javascript">
        xmlhttp = new XMLHttpRequest();
    function statusChange(id,senderMail){
        //alert(id);
        str=document.getElementById(id).innerText;
        //alert(str);

    xmlhttp.onreadystatechange = function() {
        
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            m=document.getElementById(id);
            var i=xmlhttp.responseText;
            //alert(i);
            if(i=="success"){
                m.innerText="";
            }
                //m.innerHTML=i;
                
        }
    };
    var url="shopOwnerPHP/messageStatus.php?sender="+senderMail;
    //alert(url);
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    }
    </script>

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
            <?php include("TemplateFile/messageTemplate.php"); ?>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            
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
                                <div><?php echo $jsonShopOwnerData[0]->ShopName; ?></div>
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
                    <li class="selected">
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
        <div id="page-wrapper" style="background-color: #FFFFFF;" >

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Message</h1>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-md-12">
                 <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#inbox">Inbox</a></li>
    <li><a data-toggle="tab" href="#outbox">Outbox</a></li>
  </ul>
  <div class="tab-content">
    <div id="inbox" class="tab-pane fade in active">
       <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for($i=0;$i<sizeof($inboxMessageData);$i++){
                ?>
              <tr>
                <td><?php echo $inboxMessageData[$i]->name; ?></td>
                <td><?php echo $inboxMessageData[$i]->Date; ?></td>
                <td>
                  <button type="button" onclick="statusChange('status<?php echo $i; ?>','<?php echo $inboxMessageData[$i]->SenderMail ?>')" class="btn btn-info" data-toggle="modal" data-target="#open<?php echo $i ?>">Open</button>
                  <!-- Modal -->
                  <div class="modal fade" id="open<?php echo $i ?>" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Message Details</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="sendeName">Sender:</label>
                                    <div class="col-sm-10">
                                      <span><?php echo $inboxMessageData[$i]->name ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Email:</label>
                                    <div class="col-sm-10">
                                      <span><?php echo $inboxMessageData[$i]->SenderMail ?></span>
                                    </div>
                                </div>
                                <input type="hidden" name="SenderMail" value="<?php echo $inboxMessageData[$i]->SenderMail ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="message">Message: </label>
                                    <div class="col-sm-10">          
                                       <span><?php echo $inboxMessageData[$i]->MessageBody ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="reply">Reply: </label>
                                    <div class="col-sm-10">          
                                        <textarea class="form-control" rows="5" id="reply" name="reply"></textarea>
                                    </div>
                                </div>
                                 <button type="submit" name="send" class="btn btn-primary margin-left">Send</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                </td>
                <td id="status<?php echo $i; ?>"><?php if($inboxMessageData[$i]->Status == "unread") echo "Unread"; ?></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
    </div>

    <div id="outbox" class="tab-pane fade">
       <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for($i=0;$i<sizeof($outboxMessageData);$i++){
                ?>
              <tr>
                <td><?php echo $outboxMessageData[$i]->name; ?></td>
                <td><?php echo $outboxMessageData[$i]->Date; ?></td>
                <td>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#outboxMessage<?php echo $i; ?>">Open</button>
                  <!-- Modal -->
                  <div class="modal fade" id="outboxMessage<?php echo $i; ?>" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Message Details</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="receiverName">To:</label>
                                    <div class="col-sm-10">
                                      <span><?php echo $outboxMessageData[$i]->name; ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="message">Message: </label>
                                    <div class="col-sm-10">          
                                       <span><?php echo $outboxMessageData[$i]->MessageBody; ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>

                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
    </div>
  </div>
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="../assets/plugins/jquery-1.10.2.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
     

</body>

</html>
