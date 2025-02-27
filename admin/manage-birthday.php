<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym System Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/fullcalendar.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../font-awesome/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
    <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>

<?php include 'includes/topheader.php'?>

<?php $page="announcement"; include 'includes/sidebar.php'?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a>
            <a href="announcement.php">Birthday</a>
            <a href="#" class="current">Manage Birthday</a>
        </div>
        <h1 class="text-center">Manage Birthday <i class="fas fa-bullhorn"></i></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class='widget-box'>
                    <div class='widget-title'>
                        <span class='icon'><i class='fas fa-bullhorn'></i></span>
                        <h5>Birthday Announcement table</h5>
                    </div>
                    <div class='widget-content nopadding'>

                        <?php
                        include "dbcon.php";
                        $currentDate = date('m-d');
                        $qry = "SELECT * FROM members WHERE DATE_FORMAT(dob, '%m-%d') = '$currentDate'";
                        $result = mysqli_query($conn, $qry);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-hover'>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fullname</th>
                                            <th>D.O.B</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>
                                        <td>{$cnt}</td>
                                        <td>{$row['fullname']}</td>
                                        <td>{$row['dob']}</td>
                                    </tr>";
                                    echo "<tr>
                                    <td colspan='3' style='color: red;'>Today is {$row['fullname']}'s Birthday!</td>
                                </tr>";
                            
                                $cnt++;
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "<div class='alert alert-info'>No birthdays today.</div>";
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    #footer {
        color: white;
    }
</style>

<script src="../js/excanvas.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.flot.min.js"></script>
<script src="../js/jquery.flot.resize.min.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.dashboard.js"></script>
<script src="../js/jquery.gritter.min.js"></script>
<script src="../js/matrix.interface.js"></script>
<script src="../js/matrix.chat.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.form_validation.js"></script>
<script src="../js/jquery.wizard.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/matrix.popover.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.tables.js"></script>

<script type="text/javascript">
    function goPage(newURL) {
        if (newURL != "") {
            if (newURL == "-") {
                resetMenu();
            } else {
                document.location.href = newURL;
            }
        }
    }

    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
