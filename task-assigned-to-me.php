<?php
session_start();
function __autoload($class)
{
    require_once "classes/$class.php";
}

$ch = new TaskCrud();

if (isset($_GET['user']))
{
    $uid = $_GET['user'];
}else if(!empty($_SESSION["user_login"]))
{
    if ($_SESSION["user_login"] == 1 OR $_SESSION["user_login"] == 2)
    {
        header("Location: index.php");
    }else{
        $user = $_SESSION["user_login"];
    }
    
}else{
    header("Location: Login.php");
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

<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" href="assets/css/components.min.css">
    
<script>
/*    function notifyUsers(){
        if(window.Notification && Notification.permission !== "denied") {
	Notification.requestPermission(function(status) {  // status is "granted", if accepted by user
		var n = new Notification('Rimpido Task Tool', { 
			body: 'Notify me',
		}); 
	});
}
    }*/
    
    function doPoll() {
    // Get the JSON
    $.ajax({ url: 'test.json', success: function(data){
        if(data.notify) {
            // Yeah, there is a new notification! Show it to the user
            var notification = new Notification(data.title, {
                 icon:'https://lh3.googleusercontent.com/-aCFiK4baXX4/VjmGJojsQ_I/AAAAAAAANJg/h-sLVX1M5zA/s48-Ic42/eggsmall.png',
                 body: data.desc,
             });
             notification.onclick = function () {
                 window.open(data.url);      
             };
        }
        // Retry after a second
        setTimeout(doPoll,1000);
    }, dataType: "json"});
}
function notifyUsers(){
if (Notification.permission !== "granted")
{
    // Request permission to send browser notifications
    Notification.requestPermission().then(function(result) {
        if (result === 'default') {
            // Permission granted
            doPoll();
        }
    });
} else {
    doPoll();
}
}
    
function goBack() {
  window.history.back();
}
</script>    
</head>

<body class="layout-4" onload="notifyUsers()">
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
            <div class="row">
            
                <?php 
                
                if (isset($_GET["updated"]))
                {
                    /*echo '
                    <div class="col-12">
                    <div class="alert alert-success">You have successfully updated a task!</div>
                    </div>';*/
                    
                    echo '
                    <div class="col-12">
                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            You have successfully updated the task!
                                        </div>
                                    </div>
                    </div>
                    ';
                }
                if (isset($_GET["added"]))
                {
                    /*echo '
                    <div class="col-12">
                    <div class="alert alert-success">You have successfully updated a task!</div>
                    </div>';*/
                    
                    echo '
                    <div class="col-12">
                    <div class="alert alert-primary alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                            You have successfully added a task!
                                        </div>
                                    </div>
                    </div>
                    ';
                }
                
                ?>
            
       
            </div>
           <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Completed Tasks</h4>
                                    <div class="card-header-action">
                                    <button type="button" onclick="goBack()" class="btn btn-primary" >Go Back</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-2">
                                            <thead>
                                                <tr>
                                                 <th class="text-center">
                                                    -
                                                </th>
                                               
                                                <th style="width:50%;">Task Name</th>
                                                
                                                <th>Members</th>
                                                 <th>Status</th>
                                                <th>Customer</th>
                                                 <th>Due Date</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php 

                                                $rows = $ch->viewTaskByPerson($user, 1);
                                                foreach ($rows as $row2)
                                                {
                                                ?>
                                                
                                                <tr>
                                                    
                                                 <td>
                                                   -
                                                </td>
                                                    <td><a href="view-task.php?id=<?php echo $row2['Task_ID']; ?>"><?php echo $row2['category_name'] . ' - <i style="color:black;">' . $row2['Activity'] . '</i>'/*. ": " . html_entity_decode($row2['Description'])*/; ?></a></td>
                                                
                                                <td>
                                                    <!--<img alt="image" src="assets/img/avatar/Michell.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Michell Z. Aleluya">
                                                    <img alt="image" src="assets/img/avatar/Ruel.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="Ruel II Wenceslao">-->
                                                    <?php 
                                                    $rows3 = $ch->viewPerson($row2['Task_ID']);
                                                    foreach($rows3 as $row3)
                                                    {
                                                        
                                                        
                                                    $employeeName = $row3['FullName'];
                                                    ?>
                                                    <a href="task-by-profile.php?user=<?php echo $row3['User_ID']; ?>"><img alt="image" src="assets/img/avatar/<?php echo $row3['PersonResponsible']; ?>.jpg" class="rounded-circle" width="35" data-toggle="tooltip" title="<?php echo $row3['FullName']; ?>"></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <td><a href="task-by-status.php?q=<?php echo $row2['status_id']; ?>">
                                                    <div class="badge badge-success"><?php echo $row2['status_desc']; ?></div>
                                                    
                                                    </a></td>
                                                    
                                                    <td><a href="task-by-category.php?q1=<?php echo $row2['taskcat_id']; ?>">
                                                        <div class="badge badge-light"> <?php echo $row2['customer_name']; ?></div> 
                                                       
                                                        </a></td>
                                                    
                                                     <td>
                                                        <div class="badge badge-light"> <?php echo $row2['DateAdded']; ?></div> 
                                                       
                                                    </td>
                                                
                                                <td><a href="view-task.php?id=<?php echo $row2['Task_ID']; ?>" class="btn btn-secondary">Details</a></td>
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

<!-- Page Specific JS File -->
<script src="js/page/modules-datatables.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>