<?php
session_start();


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$ch = new TaskCrud();

if (isset($_GET['user']))
{
    $uid = $_GET['user'];
    echo "UID".$uid;
}else if(!empty($_SESSION["user_login"]))
{
    if ($_SESSION["user_login"] == 1 OR $_SESSION["user_login"] == 2)
    {
        echo "NO ID";
        header("Location: index.php");
        
    }else{
        echo "NO ID";
        $user = $_SESSION["user_login"];
    }
    
}else{
    echo "NO ID";
    header("Location: Login.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activityName = test_input($_POST["activityName"]);
    $taskDescription = test_input($_POST["taskDescription"]);
    $dateAdded = test_input($_POST["dateAdded"]);
    $taskCategory = test_input($_POST["taskCategory"]);
    $status = "1";
    $isActive = "1";
    $forEveryoneInit = "";
    $forEveryone = "";
    $respArray = $_POST["personResponsible"];
    $taskDuration = $_POST["taskDuration"];
    for ($counter=0; $counter<count($respArray); $counter++)
    {
        $forEveryoneInit = $respArray[$counter];
    }
    
    if ($forEveryoneInit == 0)
    {
        $forEveryone = $forEveryoneInit;
    }else {
        $forEveryone = 1;
    }
    
    $tbl_task = [
        'Activity'=>$activityName,
        'Description'=>$taskDescription,
        'DateAdded'=>$dateAdded,
        'TaskCategory'=>$taskCategory,
        'status'=>$status,
        'isActive'=>$isActive,
        'foreveryone'=>$forEveryone,
        'duration'=>$taskDuration
    ];
    
    $tableName = "tbltask";
    $success = $ch->insert($tbl_task, $tableName);
    
    if ($success == '0')
    {
       // echo "wala na input"; TO CHANGE
    }else
    {
        $maxIDHolder = $ch->viewMaxID();
        $maxID = "";
        $givenBy = $_POST["givenBy"];
        $personResponsible = $_POST["personResponsible"];
        
        foreach($maxIDHolder as $row)
        {
            $maxID = $row['Task_ID'];
        }
        
        for ($x = 0; $x<count($personResponsible); $x++)
        {
            
        $tbl_taskUser = [
            'task_id'=>$maxID,
            'PersonResponsible'=>$personResponsible[$x]
        ];
        $tableName2 = "tbltaskuser";
        
        $inserted = $ch->insert($tbl_taskUser, $tableName2);
        }//END FOR STATEMENT FOR INSERTING COLUMNS ON THE TABLE PERSONREPSONSIBLE
        
        if ($inserted == '0')
        {
            
        }else {
            
            for ($y = 0; $y<count($givenBy); $y++)
            {
                
            $tbl_taskGiven = [
                'task_id'=>$maxID,
                'user_id'=>$givenBy[$y]
            ];
            
            $tableName3 = "tbltaskgiven";
            
            $created = $ch->insert($tbl_taskGiven, $tableName3);
            
            if ($created == '0')
            {
                
            }else
            {
                header("location:index.php?added=true");
            }
                
            }//END FOR STATEMENT FOR INSERTING COLUMNS ON THE TABLE TASKGIVEN
        
        }//END FOR ELSE STATEMENT
        
    }//END FOR ELSE STATEMENT
    
}


?>

<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Add Task &mdash; Rimpido Visual Team Management Tool</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" href="assets/css/components.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="layout-4">

<!-- Page Loader -->
<!--<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>-->
    
<!-- START STYLE HERE -->
<style>
    button:disabled,
    button[disabled]{
      border: 1px solid #999999 !important;
      background-color: #cccccc !important;
      color: #666666 !important;
    }
</style>
<!-- END STYLE HERE-->
    
<!-- START SCRIPT HERE -->
<script type="text/javascript">
    
    $(document).ready(function () {
        if($('#summernote').summernote('isEmpty'))
            {
                alert('empty content!');
            }
    });
    
function checkDate(){
    var datePat = /^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/;
    var dateInput = document.getElementById("dateAdded").value;

    var matchArray = dateInput.match(datePat);
    if (matchArray == null) {
        alert("Invalid date input!");
        $('input[type=date]')[0].value = 0;
        document.getElementById("btnSave").disabled = true;
    } else {
        document.getElementById("btnSave").disabled = false;
    }
    
}
    
function submitForm(){
    document.getElementById("addTask").submit();
}
    
function success() {
    if(document.getElementById("taskCategory").value == "0") {
        document.getElementById("btnSave").disabled = true;
    } else if(document.getElementById("activityName").value == "") {
        document.getElementById("btnSave").disabled = true;
    } else if(document.getElementById("taskDescription").value == "") {
        document.getElementById("btnSave").disabled = true;
    } else if(document.getElementById("personResponsible").value == "") {
        document.getElementById("btnSave").disabled = true;
    } else if(document.getElementById("givenBy").value == "") {
        document.getElementById("btnSave").disabled = true;
    } else if(document.getElementById("dateAdded").value == "") {
        document.getElementById("btnSave").disabled = true;
    } else if (document.getElementById("estDuration").value == ""){
        document.getElementById("btnSave").disabled = true;        
    }
    else {
        document.getElementById("btnSave").disabled = false;
    }
}
    
function goBack() {
  window.history.back();
}

</script>
<!-- END SCRIPT CODE -->

<div id="app">
    
    <div class="main-wrapper main-wrapper-1">

        <div class="navbar-bg"></div>
        <!-- Start app top navbar -->
        <?php include "includes/TopNavBar.php";?>
        <!-- Start main left sidebar menu -->
        <?php include "includes/MainLeftSideBar.php";?>
        <!-- END LEFT SIDEBAR MENU -->

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                    <div class="section-header">
                     <h1>Add New Task</h1>
                    </div>
                    <div class="row">

                    <div class="container-fluid">
                         <form method="post" id="addTask" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
                           <!-- <form method="post" action="grab.php">-->
                            <div class="card col-md-12">
                               
                                <div class="card-body ">
                                    <div class="form-row">
                                        <label  style="color: red !important;"><b>NOTE: Field with <span class="required" style="color: red !important;">( * )</span> is required</b></label>
                                        <div class="form-group col-md-12">
                                        <label for="inputEmail4">Task Category <span class="required" style="color: red !important;">*</span><small><i><br><sub><a href="add-task-category.php">No Task Category? Click here to add New Task Category</a></sub></i></small></label>
                                            <select id="taskCategory" class="form-control selectric" name="taskCategory" onkeyup="success()"  tabindex="1" required>
                                                <option default value="0" disabled="true" selected="selected"></option>
                                               <?php 
                                               
                                               $rows3 = $ch->viewTaskCat();
                                               foreach($rows3 as $row)
                                                
                                                {
                                               
                                               ?> 
                                               <option value="<?php echo $row['taskcat_id']; ?>"><?php echo $row['customer_name'] . ' - ' . $row['category_name']; ?></option>
                                               <?php 
                                               }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label>Activity <span class="required" style="color: red !important;">*</span></label>
                                            <input type="text" name="activityName" id="activityName" class="form-control" onkeyup="success()"  tabindex="2" required>
                                            <div class="invalid-feedback">Please fill in the Activity Name</div>
                                        </div>
                                        <div class="form-group col-md-12 border">
                                            <label>Descriptions <span class="required" style="color: red !important;">*</span></label>
                                            <textarea class="summernote" id="taskDescription" name="taskDescription" onkeyup="success()" tabindex="3"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                           <label for="inputEmail4">Person Responsible <span class="required" style="color: red !important;">*</span> <small> (you can select more than 1 employee)</small></label>
                                            <select id="personResponsible" class="form-control selectric" name="personResponsible[]" multiple="" onkeyup="success()" tabindex="4" required>
                                                <option default disabled="disabled"></option>
                                                <option value="0">OPEN TO ALL EMPLOYEES</option>
                                               <?php 
                                               
                                               $rows = $ch->viewEmp('2', '1');
                                               foreach($rows as $row)
                                                
                                                {
                                               
                                               ?> 
                                               <option value="<?php echo $row['User_ID']; ?>"><?php echo $row['FullName']; ?></option>
                                               <?php 
                                               }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                           <label for="inputEmail4">Given By <span class="required" style="color: red !important;">*</span><small>(you can select more than 1 employer)</small></label>
                                           <select id="givenBy" class="form-control selectric" name="givenBy[]" multiple="" onkeyup="success()" tabindex="5" required>
                                                <option default disabled="disabled"></option>
                                               <?php 
                                               
                                               $rows = $ch->viewEmp('3', '');
                                               foreach($rows as $row)
                                                
                                                {
                                               
                                               ?> 
                                               <option value="<?php echo $row['User_ID']; ?>"><?php echo $row['FullName']; ?></option>
                                               <?php 
                                               }
                                               ?>
                                            </select>
                                        </div>
                                         <!--<div class="form-group col-md-6">
                                            <label for="inputAddress">Task Duration</label>
                                            <input type="text" class="form-control" id="Duration" placeholder="2 Hours.." name="duration">
                                        </div>-->
                                        <div class="form-group col-md-6">
                                            <label>Due On <span class="required" style="color: red !important;">*</span></label>
                                            <input type="date" id="dateAdded" class="form-control" name="dateAdded" onkeyup="success()" onblur="checkDate()" required>
                                        </div>
                                        
                                       <!-- <div class="form-group col-md-6">
                                            <label>Estimated Task Duration (in hours) <small><i style="color: red !important;">*required</i></small></label>
                                            <input type="number" id="estDuration" class="form-control" name="taskDuration" onkeyup="success()" required>
                                        </div>-->
                                        
                                        <div class="form-group col-md-6">
                                            <label>Estimated Task Duration (in hours) <span class="required" style="color: red !important;">*</span></label>
                                            <input type="number" id="estDuration" class="form-control" name="taskDuration" required>
                                        </div>
                                        
                                    
                                 
                                </div>
                                  <div class="card-footer">
                                    <center>
                                    
                                    <button type="button" id="btnSave" class="btn btn-primary col-md-2" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" disabled>Save</button>    
                                    <button class="btn btn-danger col-md-2" onclick="goBack()" type="button">Cancel</button>
                                    </center>
                                </div>
                            </div>   
                          </div>
                        </form>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    <!-- START MODAL HERE -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            
            <h4 class="modal-title">Add Task</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>Do you want to save new task?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal" onclick="submitForm()">Yes</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END MODAL HERE -->
    
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/datatables/datatables.min.js"></script>
<script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="assets/modules/summernote/summernote-bs4.js"></script>
<!--<script src="assets/modules/apexcharts/apexcharts.min.js"></script>
<script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>-->
<!--
 Page Specific JS File 
<script src="js/page/modules-datatables.js"></script>-->
    
<script src="js/page/forms-advanced-forms.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>