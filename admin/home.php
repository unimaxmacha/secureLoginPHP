<?php
  // Initialize the session
  session_start();

  // Check if the user is logged in, if not then redirect him to login page.
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
  }

  $module  =  isset($_REQUEST['m']) ? $_REQUEST['m'] : '';
  $container  =  isset($_REQUEST['p']) ? $_REQUEST['p'] : 'dashboardContent';

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
  <!-- Includeing header files -->
  <?php include 'pages/common/headerScript.php'; ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    <?php 
      // Include NavBar for Dashboard
      include 'pages/common/navBar.php'; 
      // Include Aside menus for Dashboard.
      include 'pages/common/asideMenus.php';
    ?>
    <!-- If click to any for the aside menus then the page is included into dashboard content area 
      else show the defaule dashboard page -->

    <div class="content-wrapper">
    <?php 
      if(empty($module)) {
        include_once('pages/common/'.$container.".php");
      }
      else {
        include_once('pages/mod_'.$module.'/'.$container.".php");
      }
    ?>
    </div>
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
