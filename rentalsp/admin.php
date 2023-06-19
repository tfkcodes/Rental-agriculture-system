<?php include 'include/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="/rais/settings/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/rais/settings/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/rais/settings/main1.css">
    <link rel="stylesheet" href="/rais/settings/font-awesome/css/font-awesome.min.css">
    <script src="https://www.gstatic.com/charts/loader.js">
    </script>
    <script src="/rais/settings/chart.js/Chart.js"></script>
    <script src="/rais/settings/chart.js/Chart.bundle.min.js"></script>
    <script src="/rais/settings/chart.js/loader.js"></script>
    <script src="/rais/settings/bootstrap/js/bootstrap.js"></script>
    <script src="/rais/settings/jquery/jquery-3.6.0.js"></script>
    <script src="/rais/settings/jquery/jquery-3.6.0.min.js"></script>
    <script src="/rais/settings/toastr/toastr.js"></script>


    <script src="/datatable/js/jquery.dataTables.js"></script>
    <script src="/datatable/js/dataTables.bootstrap.js"></script>
    <link rel="stylesheet" href="/DataTables/DataTables-1.13.4/css/">
    <link rel="stylesheet" href="/DataTables/datatables.css">
    <script src="/DataTables/datatables.min.js"></script>

    <script src="/rais/settings/DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="/rais/settings/DataTables/datatables.min.css">

    <title>RAIS | Admin</title>
</head>

<body onload="load()">
    <!--parts for dashbord start here-->
    <div class="section" id="body-id">
        <div class="row">
            <div class="col-sm-2 side-nav sidebar-collapse">
                <!--begining side bar nav-->
                <div class="sidebar-collapse side-nav">
                    <!-- Begin side nav profile -->
                    <div class="nav-header">
                        <div class="section profile-element-c">
                            <div class="dropdown profile-element text-center">
                                <a>
                                    <img src="/rais/images/sunflower.jpg" class="img-circle" alt="photo">
                                    <div class="section">

                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="logo-element text-center text-light mt-4">RAIS | Admin</div>
                    </div>
                    <!-- End side nav profile -->
                    <!--bigning menu-->
                    <div class="sidebar-nav">
                        <ul class="side-nav ">
                            <div class="section line-sec">
                                <div class="h1 text-light">
                                    <h1>
                                        <hr>
                                    </h1>
                                </div>
                            </div>
                            <div class="section profile-top">
                                <li>
                                    <a href="/rais/rentalsp/admin.php"><span>Dashboard </span><i
                                            class="fa fa-windows text-light"></i></a>
                                </li>

                                <div class="section line-sec">
                                    <div class="h1 text-light">
                                        <h1>
                                            <hr>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="mainmenu">
                                <a href="#"><i class="fa fa-users"></i><span>Users</span></a>
                                <div class="submenu">
                                    <ul>
                                        <li><a href="/rais/rentalsp/add-user.php"><i class="fa fa-user"></i><span>
                                                    User View</span></a></li>
                                        <li><a href="/rais/rentalsp/manage-user.php"><i
                                                    class="fa fa fa-edit"></i><span>Manage User</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mainmenu">
                                <a href="system_logs.php"><i class="fa fa-trash"></i><span>System Logs</span></a>

                            </div>

                            <div class="section mt-4 line-sec">
                                <div class="h1 text-light">
                                    <h1>
                                        <hr>
                                    </h1>
                                </div>
                            </div>
                            <div class="section mt-4">

                                <div class="container">
                                    <a href="#" class="profile-key">
                                        <i class="fa fa-user"></i>
                                        <span> Profile</span>
                                    </a>
                                </div>
                            </div>
                    </div>
                    <!--End menu-->
                </div>
            </div>
            <div class="col-sm-10">

                <!--TOP NAV BEGIN HERE-->
                <div class="row border-bottom">
                    <nav class="navbar navbar-expand-sm navbar-light navbar-static-top bg-secondary" id="nav-bar-top">
                        <div class="container-fluid">
                            <a class="navbar-minimalize minimalize-styl-2 btn" href="#" id="btn-toggle-1"><i
                                    class="fa fa-bars"></i></a>
                            <a href="../logout.php" data-method="post" class="log-out btn btn-toggle"><i
                                    class='fa fa-power-off'></i> Log out</a>
                        </div>
                    </nav>
                </div>
                <!--section for dashbord -->
                <div class="section mt-4">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="h3">Dashboard</div>
                        </div>
                        <div class="col-lg-6">
                            <div class="section mt-1">
                                <div class="container-fluid text-dark">
                                    <h4 class="pull-left">Logged in as:&nbsp;<strong style="color: #0066cc;">
                                            <?php
                                  $conn = $pdo->open();
                                  $stmt = $conn->prepare("SELECT firstname,lastname FROM users WHERE user_id=:user_id");
                                  $stmt->execute(['user_id'=>$_SESSION['admin']]);
                                  $crow =  $stmt->fetch();
                                  $firstnm=$crow['firstname'];
                                  $lastname=$crow['lastname'];
                                  echo "<td class='text-primary'>$firstnm  $lastname</td>";
                                  $pdo->close();
                                ?>
                                        </strong> </h4>

                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!--section for dashbord content here-->
                <div class="content">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-globe "></i>
                                                <i class="fa fa-list-alt text-success fa-4x" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Category</p>
                                                <p class="card-title" id='0101'>
                                                    <?php
                                                    $conn = $pdo->open();
                                                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category");
                                                    $stmt->execute();
                                                    $crow =  $stmt->fetch();
                                                     echo "<h3 class='card-title' >".$crow['numrows']."</h3>";

                                                     $pdo->close();
                                                    ?>
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/rais/rentalsp/category.php">
                                    <div class="card-footer card-foote-style">
                                        <div class="stats text-center">
                                            <i class="fa fa-refresh"></i>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-money-coins text-success"></i>
                                                <i class="fa fa-users text-success fa-4x" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Users</p>
                                                <p class="card-title" id='0102'>
                                                    <?php
                                                    $conn = $pdo->open();
                                                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users");
                                                    $stmt->execute();
                                                    $crow =  $stmt->fetch();
                                                     echo "<h3 class='card-title' >".$crow['numrows']."</h3>";

                                                     $pdo->close();
                                                    ?>
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/rais/rentalsp/manage-user.php">
                                    <div class="card-footer card-foote-style">
                                        <div class="stats text-center">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-vector text-danger"></i>
                                                <i class="fa fa-signing text-success fa-4x" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Equipments</p>
                                                <p class="card-title" id='0103'>
                                                    <?php
                                                    $conn = $pdo->open();
                                                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products");
                                                    $stmt->execute();
                                                    $crow =  $stmt->fetch();
                                                     echo "<h3 class='card-title' >".$crow['numrows']."</h3>";

                                                     $pdo->close();
                                                    ?>
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/rais/rentalsp/manage-product.php">
                                    <div class="card-footer card-foote-style">
                                        <div class="stats text-center">
                                            <i class="fa fa-refresh"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <i class="nc-icon nc-favourite-28 text-primary"></i>
                                                <i class="fa fa-comments-o text-info fa-4x" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Request</p>
                                                <p class="card-title">
                                                    <?php
                                                    $conn = $pdo->open();
                                                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM request");
                                                    $stmt->execute();
                                                    $crow =  $stmt->fetch();
                                                     echo "<h3 class='card-title' >".$crow['numrows']."</h3>";

                                                     $pdo->close();
                                                    ?>
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/rais/rentalsp/request.php">
                                    <div class="card-footer card-foote-style">
                                        <div class="stats text-center">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row row-middle">
                        <div class="col-md-4 card-user1" id="col1">
                            <div class="card card-user">
                                <div class="image">
                                </div>
                                <div class="card-body profile-body">
                                    <div class="author text-center">
                                        <a href="#">
                                            <img class="avatar border-gray" src="/rais/images/chef-3.jpg" alt="...">
                                            <h5 class="title">John James</h5>
                                        </a>
                                        <p class="description">
                                            @AdminBenny
                                        </p>
                                    </div>
                                    <p class="description text-center">
                                        "Consistency is the key for<br>
                                        every success"
                                    </p>
                                </div>
                                <div class="card-footer foot-card">
                                    <hr>
                                    <div class="button-container">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-6 text-center c-footer-p">
                                                <a href="#">
                                                    <h5>12 <small>Files</small></h5>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-6 text-center">
                                                <a href="#">
                                                    <h5><small>Update</small></h5>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--Script main here-->
    <script src="/rais/settings/main.js"></script>
    <!--Counter Js-->
</body>
<!--Script for 3d charts-->
<script>
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawFunction);

function drawFunction() {
    var data = google.visualization.arrayToDataTable([
        ["Users", "Total"],
        ["Engineers", 30],
        ["Vistors", 300],
        ["Followers", 500],
        ["Admin", 20],
        ["Other", 30]
    ]);
    var options = {
        title: '',
        is3D: true
    };
    var chart = new google.visualization.PieChart(document.getElementById('box'));
    chart.draw(data, options);
}
</script>
<Script>
$(document).ready(function() {
    $('#btn-toggle-1').sideToggle({
        moving: '.side-nav',
        direction: 'left'
    });
});
</Script>

</html>