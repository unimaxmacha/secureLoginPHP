<?php
	/* include config file */
	require_once "../includes/config.php";

	/* Define variables and initialize with empty values */
	$fullname = $username = $email = $password = $confirm_password = $address = "";
	$fullname_err = $username_err = $email_err = $password_err = $confirm_password_err = $address_err = "";

	/* Processing form data when form is submitted. */
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		// Validate fullname
		$input_name = trim($_POST["fullname"]);
	    if(empty($input_name)){
	        $fullname_err = "名前を入力してください。";
	    } 
	    // elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
	    //     $name_err = "Please enter a valid name.";
	    // } 
	    else{
	        $fullname = $input_name;
	    }

		// Validate username
		$input_username = trim($_POST["username"]);
		if(empty($input_username)) {
			$username_err = "ユーザー名を入力してください。";
		} else {
			// Prepare a select statement.
			$sql = "SELECT id FROM tbl_users WHERE username = ?";

			if($stmt = $dbConn->prepare($sql)) {
				//Bind variables to the prepared statement as parameters
				$stmt->bind_param("s", $param_username);

				// Set parameters
				$param_username = $input_username;

				// Attempt to execute the prepared statement
				if ($stmt->execute()) {
					// Store result
					$stmt->store_result();

					if ($stmt->num_rows == 1) {
						$username_err = "このユーザー名は既に使われています。";
					} else {
						$username = $input_username;
					}
				} else {
					echo "Opps! Something went wrong. Please try again later.";
				}

				// Close statement
				$stmt->close();
			}
		}

		//Validate email
		$input_email = trim($_POST["email"]);
		$regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
		if(empty($input_email)) {
			$email_err = "E－メールを入力してください。";
		} else if(!preg_match($regex, $input_email)) {
			$email_err = $input_email . " は無効なメールです。 もう一度やり直してください。";
		} else {
			$email = $input_email;
		}

		// Validate password
		$input_password = trim($_POST["password"]);
		if (empty($input_password)) {
			$password_err = "パスワードを入力してください。";
		} else if (strlen($input_password) < 6) {
			$password_err = "パスワードは6文字以上である必要があります。";
		} else {
			$password = $input_password;
		}

		// Validate confirm password
		$input_confirm_password = trim($_POST["confirm_password"]);
		if(empty($input_confirm_password)) {
			$confirm_password_err = "確認パスワードを入力してください。";
		} else {
			$confirm_password = $input_confirm_password;
			if (empty($password_err) && ($password != $confirm_password)) {
				$confirm_password_err = "パスワードが一致しませんでした。";
			}
		}

		// Validate address
		$input_address = trim($_POST["address"]);
		if (empty($input_address)) {
			$address_err = "住所を入力してください。";
		} else {
			$address = $input_address;
		}

		// Check input errors before inserting in database
		if (empty($fullname_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($address_err)) {

			// Prepare an insert statement
			$sql = "INSERT INTO `tbl_users` (fullname, username, email, password, address, create_at) VALUES (?, ?, ?, ?, ?, ?)";
			if($stmt = $dbConn->prepare($sql)) {
				// Bind variables to the prepared statement as parameters
				echo $stmt->bind_param("ssssss", $param_fullname, $param_username, $param_email, $param_password, $param_address, $create_at);

				/* Set the "cost" parameter to 12. */
				$options = ['cost' => 12];
				// Set parameters
				$param_fullname = $fullname;
				$param_username = $username;
				$param_email 	= $email;
				$param_password = password_hash($password, PASSWORD_DEFAULT, $options); // Create a password hash
				// $param_password = md5($password);
				$param_address 	= $address;
				$create_at = date("Y-m-d H:i:s");
				// Attempt to execute the prepared satement
				if($stmt->execute()) {
					// Redirect to login page.
					header("location: login.php");
				} else {
					echo "Something went wrong. Please try again later.";
				}

				// Close Statement
				$stmt->close();
			}
		}
			// Close database connection
			$dbConn->close();
		
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ユーザー作成</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrapper">
        <h2>サインアップ</h2>
        <p>アカウントを作成するには、このフォームに記入してください。</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        	<div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
        		<label>お名前：</label>
        		<input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
        		<span class="help-block"><?php echo $fullname_err; ?></span>
        	</div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>ユーザー名：</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            	<label>E－メール：</label>
            	<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            	<span class="help-block"><?php echo $email_err; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>パスワード：</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>パスワード確認：</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
            	<label>住所：</label>
            	<input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
            	<span class="help-block"><?php echo $address_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="提出">
                <input type="reset" class="btn btn-default" value="リセット">
            </div>
            <p>アカウント済み？<a href="login.php"><b>ログイン</b></a></p>
        </form>
    </div>    
</body>
</html>