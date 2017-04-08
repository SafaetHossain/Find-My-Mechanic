<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebTechnology Final Project</title>
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/jquery.datepick.css" rel="stylesheet" />

   <link href="assets/css/style.css" rel="stylesheet" />
   <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-primary">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Enter Your information</h3>
                    </div>
                    <div class="panel-body">
                          <form class="form-horizontal" action = "carAction.php" method = "Post">

                             <div class="form-group">
                                <label class="control-label col-sm-2" for="Name">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "carOwnerName" id="name" placeholder="Enter Name" required>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" name = "carOwnerEmail" id="email" placeholder="Enter email" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Contact:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "carOwnerPhone" id="pwd" placeholder="Enter Contact Number" required="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="DOB">DOB:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "carOwnerDOB" id="popupDatepicker" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="nid">NID:</label>
                                <div class="col-sm-10">
                                  <input type="number" class="form-control" id="nid" name = "carOwnerNID" placeholder="Enter NID Number" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="dlc">Driving Licence:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="dlc" name = "carOwnerDriving" placeholder="Enter Driving Licence" required="">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="pwd" name = "carOwnerPWD" placeholder="Enter Password" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="pwd" placeholder="Enter Password Again" required>
                                </div>
                              </div>
                               <div class="form-group">
                                  <label class="control-label col-sm-2" for="comment">Address:</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control" id="comment" name = "carOwnerAddress" required=""></textarea>
                                  </div>
                                  
                               </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
   
    
   
    <script src="assets/plugins/jquery-1.12.0.min.js"></script>
    <script src="assets/plugins/jquery.plugin.min.js"></script>
   <script src="assets/plugins/jquery.datepick.js"></script>

<script>
$(function() {
  $('#popupDatepicker').datepick({dateFormat: 'yyyy-mm-dd'});
   
});
</script>
    
</body>

</html>