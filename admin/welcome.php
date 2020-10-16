<?php
	// Initialize the session
	session_start();

	// Check if the user is logged in, if not then redirect him to login page.
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
		header("location: login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>管理パネル</title>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="welcome_msg">
		<div class="page-header">
			<h1>こにちは、 <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. 管理パネルへようこそ！</h1>
		</div>
		<p>
			<a href="resetPassword.php" class="btn btn-warning">パスワードをリセットする。</a>
			<a href="logout.php" class="btn btn-danger">ログアウト</a>
		</p>
	</div>
</body>
</html>