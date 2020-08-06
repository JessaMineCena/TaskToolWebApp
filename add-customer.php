<?php

function __autoload($class)
{
    require_once "classes/$class.php";
}

$ch = new TaskCrud();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activityName = test_input($_POST["activityName"]);
    $taskDescription = test_input($_POST["taskDescription"]);
    $personResponsible = test_input($_POST["personResponsible"]);
    $givenBy = test_input($_POST["givenBy"]);
    $duration = test_input($_POST["duration"]);
    $dateAdded = test_input($_POST["dateAdded"]);
    $taskCategory = test_input($_POST["taskCategory"]);
    $status = "created";
    
    $tbl_task = [
        'Activity'=>$activityName,
        'Description'=>$taskDescription,
        'Duration'=>$duration,
        'DateAdded'=>$dateAdded,
        'TaskCategory'=>$taskCategory,
        'status'=>$status
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
        
        foreach($maxIDHolder as $row)
        {
            $maxID = $row['Task_ID'];
        }
        
        
        $tbl_taskUser = [
            'task_id'=>$maxID,
            'PersonResponsible'=>$personResponsible
        ];
        $tableName2 = "tbltaskuser";
        
        $inserted = $ch->insert($tbl_taskUser, $tableName2);
        
        if ($inserted == '0')
        {
            
        }else {
            $tbl_taskGiven = [
                'task_id'=>$maxID,
                'user_id'=>$givenBy
            ];
            
            $tableName3 = "tbltaskgiven";
            
            $created = $ch->insert($tbl_taskGiven, $tableName3);
            
            if ($created == '0')
            {
                
            }else
            {
                header("task-recent.php");
            }
        }
        
        
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">

<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>List of Tasks &mdash; Rimpido Visual Team Management Tool</title>

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
</head>

<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        <!-- Start app top navbar -->
        <?php include "includes/TopNavBar.php";?>
        <!-- END TOP NAV BAR-->
        
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
                    
                    <div class="container">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="card col-md-12">
                               
                                <div class="card-body ">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <label>Activity</label>
                                            <input type="text" name="activityName" class="form-control" required>
                                            <div class="invalid-feedback">Please fill in the Activity Name</div>
                                        </div>
                                        <div class="form-group col-md-12 border">
                                            <label>Descriptions</label>
                                            <textarea class="summernote-simple" name="taskDescription"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                           <label for="inputEmail4">Person Responsible</label>
                                           <select id="inputState" class="form-control selectric" name="personResponsible">
                                                <option default readonly> -----SELECT ----</option>
                                                <option value="">OPEN TO ALL EMPLOYEES</option>
                                                <?php 
                                                
                                                $rows2 = $ch->viewEmp('2');
                                               
                                                foreach($rows2 as $row)
                                                {
                                               
                                                ?>
                                                <option value="<?php echo $row['User_ID']; ?>"><?php echo $row['FullName']; ?></option>
                                                <?php 
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                           <label for="inputEmail4">Given By</label>
                                           <select id="inputState" class="form-control selectric" name="givenBy">
                                                <option default readonly> -----SELECT ----</option>
                                               <?php 
                                               
                                               $rows = $ch->viewEmp('3');
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
                                            <label for="inputAddress">Task Duration</label>
                                            <input type="text" class="form-control" id="Duration" placeholder="2 Hours.." name="duration">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Due On</label>
                                            <input type="date" class="form-control" name="dateAdded">
                                    </div>
                                        <div class="form-group col-md-12">
                                        <label for="inputEmail4">Task Category <sub><small><i style="color:red !important;">Add New Task Category</i></small></sub></label>
                                           <select id="inputState" class="form-control selectric" name="taskCategory">
                                              <option default readonly> -----SELECT ----</option>
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
                                    </div>
                                 
                                </div>
                                  <div class="card-footer">
                                    <center>
                                    <button class="btn btn-primary col-md-2" type="submit">Save</button>
                                    <button class="btn btn-danger col-md-2">Cancel</button>
                                    </center>
                                </div>
                            </div>
                            </form>
                               </div> 
                    </div>
            </section>
        </div>
    </div>
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