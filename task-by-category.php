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
                                                <th>Members</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Due Date</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                   
                                          
                                                <?php 
                                                
                                                $ch = new TaskCrud();
                                                $rows = $ch->viewTaskList();
                                                foreach ($rows as $row2)
                                                {
                                                ?>
                                                
                                                <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><?php echo $row2['Activity'] . ": " . $row2['Description']; ?></td>
                                                
                                                <td>
                                                    <?php 
                                                    $rows3 = $ch->viewPerson($row2['Task_ID']);
                                                    foreach($rows3 as $row3)
                                                    {
                                                    ?>
                                                    <img alt="image" src="assets/img/avatar/<?php echo $row3['PersonResponsible']; ?>.jpg" class="rounded-circle" width="25" data-toggle="tooltip" title="<?php echo $row3['FullName']; ?>">
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td>
                                                    <div class="badge badge-warning"><?php echo $row2['status']; ?></div>
                                                    
                                                </td>
                                                    
                                                    <td>
                                                        <div class="badge badge-light"> <?php echo $row2['TaskCategory']; ?></div> 
                                                       
                                                    </td>
                                                    
                                                     <td>
                                                        <div class="badge badge-light"> <?php echo $row2['DateAdded']; ?></div> 
                                                       
                                                    </td>
                                                
                                                    <td><a href="view-task.html" class="btn btn-secondary">Details</a></td>
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
            </section>
             <section class="section">
                   <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Available Tasks for today</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-2">
                                            <thead>
                                                <tr>
                                                <th class="text-center">
                                                    
                                                </th>
                                                <th>Task Name</th>
                                                <th>Members</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>
                                                    <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td> Health Check</td>
                                                
                                                <td>
                                                    <!--<img alt="image" src="assets/img/avatar/SirKevin.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Kevin Mendi">
                                                    <img alt="image" src="assets/img/avatar/Jessamine.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Jessamine Cena">-->
                                                    <span class="badge badge-pill badge-dark">Available to Everyone</span>
                                                </td>
                                                
                                                <td><div class="badge badge-primary">Repeating Task</div></td>
                                                <td class="align-middle">
                                                <div class="badge badge-light">ROCHE</div>    
                                                </td>
                                                <td><a href="view-task2.html" class="btn btn-secondary">Details</a></td>
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