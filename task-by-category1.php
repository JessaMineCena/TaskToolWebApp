<?php

function __autoload($class)
{
    require_once "classes/$class.php";
}


/*if(isset($_GET['cat']))
{
    $blogList = new Chempo();
    
    $category2 = $_GET['cat'];
    
    $rows = $blogList->searchTask($category2);
}*/
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

<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" href="assets/css/components.min.css">
</head>

<body class="layout-4">
<!-- Page Loader -->
<!--<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>-->

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
                     <h1>Tasks by Category</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                   
                                        
                                       
                                        
                                    <div class="dropdown d-inline mr-2">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Time Tool Tasks
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Time Tool Tasks</a>
                                            <a class="dropdown-item" href="#">Roche Tasks</a>
                                            <a class="dropdown-item" href="#">Sasol Tasks</a>
                                            <a class="dropdown-item" href="#">HR Tasks</a>
                                        </div>
                                        </div>
 <!----******************************************** ViewTaskList by category ******************************************* --------- -->

                                
 <!----******************************************** ViewTaskList by category end ******************************************* --------- -->                     
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-2">
                                            <thead>
                                                <tr>
                                                <th class="text-center">
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Task Name</th>
                                                <th>Given By</th>
                                                <th>Members</th>
                                                <th>Date Added</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<!--                                                <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>HR Tasks - Michell's OJT contract and agreement/ requirement for bank account application</td>
                                                <td>
                                                   <img alt="image" src="assets/img/avatar/MaamZedda.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Zedda Lustre Schuur"/> 
                                                </td>
                                                <td class="align-middle">
                                                    <img alt="image" src="assets/img/avatar/MaamEivon.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Eivon Pescadero Lustre">
                                                </td>
                                                <td>2020-02-14</td>
                                                <td><div class="badge badge-success">Completed</div></td>
                                                <td><a href="#" class="btn btn-secondary">details</a></td>
                                                </tr>-->
                                                <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>Time tool - Creation of Pages (Design & Structure) for Rimpido Time Tool</td>
                                                <td class="align-middle">
                                                     <img alt="image" src="assets/img/avatar/MaamZedda.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Zedda Lustre- Schuur">
                                                     <img alt="image" src="assets/img/avatar/Sir_Jan.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Dr. Jan Schuur">
                                                </td>
                                                <td>
                                                    <img alt="image" src="assets/img/avatar/Michell.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Michell Z. Aleluya">
                                                    <img alt="image" src="assets/img/avatar/Ruel.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Ruel II Wenceslao">
                                                </td>
                                                <td>2020-02-15</td>
                                                <td><div class="badge badge-warning">In Progress</div></td>
                                                <td><a href="view-task.html" class="btn btn-secondary">details</a></td>
                                                </tr>
                                              <!--  <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                                    <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>Roche - ZDEL_DUP_TEST (Delete Duplicate Composition)</td>
                                                <td class="align-middle">
                                                    <img alt="image" src="assets/img/avatar/Sir_Jan.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Jan Schuur">
                                                </td>
                                                <td>
                                                    <img alt="image" src="assets/img/avatar/SirKevin.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Debra Stewart">
                                                </td>
                                                <td>2020-02-07</td>
                                                <td><div class="badge badge-warning">In Progress</div></td>
                                                <td><a href="#" class="btn btn-secondary">details</a></td>
                                                </tr>-->
                                                <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                                    <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>Time tool - PHP Implementation of the pages</td>
                                                <td class="align-middle">
                                                    <img alt="image" src="assets/img/avatar/MaamZedda.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Zedda Lustre- Schuur"> 
                                                    <img alt="image" src="assets/img/avatar/Sir_Jan.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Dr. Jan Schuur">
                                                </td>
                                                <td>
                                                    <img alt="image" src="assets/img/avatar/Jessamine.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Jessamine Joy Cena">
                                                    <img alt="image" src="assets/img/avatar/Michell.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Michell Aleluya">
                                                </td>
                                                <td>2020-02-17</td>
                                                <td><div class="badge badge-info">Created</div></td>
                                                <td><a href="view-task.html" class="btn btn-secondary">details</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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


<!-- Page Specific JS File -->
<script src="js/page/modules-datatables.js"></script>
    
<script src="js/page/forms-advanced-forms.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>