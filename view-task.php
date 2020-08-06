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
                    <h1>Task Details</h1>

                    </div>
                    <div class="section-body">
                    
                    <div class="card">
                        <div class="card-header">
                            <h4>Time tool - Creation of Pages (Design & Structure) for Rimpido Time Tool</h4>
                        </div>
                        <div class="card-body">
                            <p>Creation of the main pages for the end- users. This includes: 
                                <li>Create New Tasks</li>
                                <li>View Tasks</li>
                                <li>Update Tasks</li>
                                <li>List of Tasks</li>
                                <li>Page for task Statistics</li>
                                <li>Implementation of lozad</li>
                            </p>
                        </div>
                        <div class="card-footer bg-whitesmoke">Person/s Responsible: <b>Ruel Wenceslao II, Michelle Aleluya</b> <br>
                        Given by: <b>Zedda Lustre Schuur, Jan Schuur on February 15, 2020</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                <h4>Task Comments/Notes</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                            <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/avatar/MaamZedda.png">
                                            <div class="media-body">
                                                <div class="media-right"><div class="text-primary">Acknowledged</div></div>
                                                <div class="media-title mb-1">Zedda Lustre Schuur</div>
                                                <div class="text-time">Yesterday</div>
                                                <div class="media-description text-muted">
                                                Prioritize important/basic functionality of the task tool. 
                                                </div>
                                                <div class="media-links">
                                                    <a href="#" id="swal-2">Acknowledge</a>
                                                   
                                                    <!--<a href="#">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#" class="text-danger">Trash</a>-->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                
                <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>User Progress</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                        <li class="media lozad">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/avatar/Ruel.jpg">
                                        <div class="media-body">
                                            <div class="media-title">Ruel Wenceslao II</div>
                                            <div class="text-job text-muted">Junior Developer</div>
                                        </div>
                                        <!--<div class="media-progressbar">
                                            <div class="progress-text">80%</div>
                                            <div class="progress" data-height="6">
                                            <div class="progress-bar bg-primary" data-width="30%"></div>
                                            </div>
                                        </div>-->
                                        <div class="media-progressbar">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Status</button>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Profile</button>
                                        </div>
                                        </li>
                                        <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/avatar/Michell.jpg">
                                        <div class="media-body">
                                            <div class="media-title">Michell Aleluya</div>
                                            <div class="text-job text-muted">OJT</div>
                                        </div>
                                        <div class="media-progressbar">
                                             <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Status</button>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Profile</button>
                                        </div>
                                      
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
        </div>
    </div>
</div>
    
    <!-- MODALS -->
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">User Progress</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><i><h6>User Logs:</h6></i>
                                <br> <b> Saturday, February 15, 2020 || 4:30 PM</b>
                                <li>Worked on several graphic web UIs, including: 
                                    <ul>
                                        <li>Dashboard (selection of functionality)</li>
                                        <li>Recent Tasks</li>
                                        <li>Tasks by Category</li>
                                        <li>Tasks by Status</li>
                                        <li>Recent Tasks and View Tasks</li>
                                    </ul>    
                                    </li>
                                <li>Gave a tutorial for Michell to learn Git Repositories</li>
                                <li>Installed owncloud, keepass, and winscp to Michell's PC.</li>
                                
                                <br>
                                <li>Integration of Javascript codes to the following pages:
                                <ul>
                                    <li>SummerNote Library to the Create New Tasks</li>
                                    <li>Select2 Javascript Library to List of Tasks</li>
                                    <li>tiles.js for the dashboard</li>
                                    <li>Integration of Sweetalert to the some buttons</li>
                                </ul>
                                </li>
                                
                                <br>
                                <li>Integration of the following CSS Libraries:
                                <ul>
                                    <li>Selectric for creating new Tasks</li>
                                    <li>Datatables for displaying table data</li>
                                    <li>select2 jquery for creating new Tasks</li>
                                </ul>
                                </li>
                            </p>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="openLink();">Add a New Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
    function openLink() {
        window.open("update-task.html");
    }
</script>
    
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
<script src="assets/modules/sweetalert/sweetalert.min.js"></script>

    
<!-- Page Specific JS File -->
<script src="js/page/modules-datatables.js"></script>
<script src="js/page/modules-sweetalert.js"></script>
<script src="js/page/forms-advanced-forms.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- LOZAD -->
<script src="https://raw.githubusercontent.com/w3c/IntersectionObserver/master/polyfill/intersection-observer.js"></script>

        <!-- Lozad.js from CDN -->
        <script src="https://cdn.jsdelivr.net/npm/lozad"></script>

        <script type="text/javascript">
        
        // Initialize library to lazy load images
        /*var observer = lozad('.lozad', {
            threshold: 0.1,
            load: function(el) {
                el.src = el.getAttribute("data-src");
                el.onload = function() {
                    toastr["success"](el.localName.toUpperCase() + " " + el.getAttribute("data-index") + " lazy loaded.")
                }
            }
        })
*/
            
        lozad('.lozad', {
            load: function(el) {
                el.src = el.dataset.src;
                el.onload = function() {
                    //el.classList.add('fade');
                }
            }
        }).observe();
            
        // Picture observer
        // with default `load` method
        /*var pictureObserver = lozad('.lozad-picture', {
            threshold: 0.1
        })

        observer.observe()
        pictureObserver.observe()
*/
        </script>
    
    
</html>