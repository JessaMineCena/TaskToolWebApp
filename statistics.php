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
                     <h1>Task Statistics</h1>
                    </div>
                    
            <section class="section">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>New Tasks</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Pending Tasks</h4>
                                </div>
                                <div class="card-body">
                                    42
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fa fa-strikethrough"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Overdue Tasks</h4>
                                </div>
                                <div class="card-body">
                                    1,201
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Finished Tasks</h4>
                                </div>
                                <div class="card-body">
                                    47
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-inline">Tasks for today</h4>
                                <div class="card-header-action">
                                    <a href="task-recent.html" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border">
                                    <li class="media">
                                        
                                        <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/Ruel.jpg" alt="avatar">
                                        <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/Michell.jpg" alt="avatar">
                                        <div class="media-body">
                                            <div class="badge badge-pill badge-warning mb-1 float-right">In Progress</div>
                                            <!--<div class="badge badge-pill badge-danger mb-1 mr-2 float-right"><a href="#" data-toggle="tooltip" title="Message" style="color: white;">Message</a></div>-->
                                            <h6 class="media-title"><a href="view-task.html">Time tool - Creation of Pages (Design & Structure) for Rimpido Time Tool</a></h6>
                                            <div class="text-small text-muted">Ruel Wenceslao <div class="bullet"> Michell Aleluya</div> 
                                        </div>
                                    </li>
                                    <li class="media">
                                       
                                        <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/MaamEivon.jpg" alt="avatar">
                                        <div class="media-body">
                                            <div class="badge badge-pill badge-success mb-1 float-right">Completed</div>
                                            <!--<div class="badge badge-pill badge-danger mb-1 mr-2 float-right"><a href="#" data-toggle="tooltip" title="Message" style="color: white;">Message</a></div>-->
                                            <h6 class="media-title"><a href="view-task.html">HR Tasks - Michell's OJT contract and agreement/ requirement for bank account application</a></h6>
                                            <div class="text-small text-muted">Eivon Caselle Pescadero</div>
                                        </div>
                                    </li>
                                   
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                    <form method="post" class="needs-validation" novalidate="">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add New Tasks</h4>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="form-group">
                                        <label>Task Name</label>
                                        <input type="text" name="title" class="form-control" required>
                                        <div class="invalid-feedback">Please fill in the title</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Task Details</label>
                                        <textarea class="summernote-simple"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Task Duration</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Employee Responsible</label>
                                        <select class="form-control selectric" multiple="">
                                            <option default readonly> -----SELECT EMPLOYEE ----</option>
                                            <option>Kevin Mendi</option>
                                        <option>Jessamine Cena</option>
                                            <option>Ruel  Wenceslao II</option>
                                            <option>Eivon Caselle Pescadero</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer pt-0">
                                    <button class="btn btn-primary">Save Task</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
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