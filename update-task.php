<?php

function __autoload($class)
{
    require_once "classes/$class.php";
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
                     <h1>Update Task</h1>
                    </div>
                        
                            <div class="card col-md-12">
                                
                                <div class="card-body ">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Activity</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Select Task..</option>
                                                    <option>HR Task</option>
                                                    <option>Monday.Com Task</option>
                                                    <option>SASOL - ZEHS_GETCOMP_NEW</option>
                                                    <option>Roche - Z_DEL_DUP_TEST</option>
                                                    <option>OJT General Task</option>
                                                </select>
                                        </div>
                                     
                                       <div class="form-group col-md-12">
                                            <label for="inputEmail4">Person Responsible</label>
                                                <select id="personResponsible" class="form-control">
                                                   <option selected>Choose...</option>
                                                <option>Michell Aleluya</option>
                                                <option>Ruel Wenceslao</option>
                                               <option>Jessamine Cena</option>
                                               <option>Kevin Mendi</option>
                                               <option>Eivon Caselle Pescadero</option>
                                                </select>
                                        </div>
                                     
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Status</label>
                                         <select id="status" class="form-control">
                                                    <option selected>Select status..</option>
                                                    <option>In Progress</option>
                                                    <option>In Test</option>
                                                    <option>Task is Finished</option>
                                                    <option>Waiting for Approval</option>
                                                    
                                         </select>
                                       
                                    </div>
                                           <div class="form-group col-md-6">
                                            <label>Date Update</label>
                                            <input type="date" class="form-control">
                                    </div>
                                        </div>
                                      
                                        <div class = "from-group">
                                   
                                        <div class="form-group col-md-12 border">
                                            <label>Comment</label>
                                            <textarea class="summernote-simple"></textarea>
                                        </div>
                                    </div>
                                  
                                 
                                </div>
                                  <div class="card-footer">
                                    <center>
                                        <!-- Update Task -->
                                            <?php 
                                                $initUser = new Chempo();
                                                
                                                $getUser = $initUser->updateTask($row);
                                            
                                            ?>
                                        
                                    <button class="btn btn-primary col-md-3">Save</button>
                                    <button class="btn btn-danger col-md-3">Cancel</button>
                                    </center>
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

<!-- Page Specific JS File -->
<script src="js/page/modules-datatables.js"></script>
    
<script src="js/page/forms-advanced-forms.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>