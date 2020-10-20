<?php
  // Initialize the session
  session_start();

  // Check if the user is logged in, if not then redirect him to login page.
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
  }
  // Include config file
  require_once "../includes/config.php";
  require_once('../includes/helpers.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SecureLogin | Dashboard</title>
  //Includeing header files
  <?php include 'pages/common/header.php'; ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    <?php include 'pages/common/navBar.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'pages/common/asideMenus.php'; ?>
    <!-- /Main Sidebar Container -->
    

    <!-- Content Wrapper. Contains page content -->
    <?php include 'pages/common/dashboardContent.php'; ?>
    <!-- /.content-wrapper -->

    <!-- Footer Message -->
    <?php include 'pages/common/footerMsg.php'; ?>
    <!-- /Footer Message -->

  </div>
  <!-- ./wrapper -->

  <!-- Footer Message -->
  <?php include 'pages/common/footerScript.php'; ?>
  <!-- /Footer Message -->

</body>
</html>
