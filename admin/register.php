<?php
	/* include config file */
	require_once "config.php";
	//

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
			}
		}

	} else {

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ユーザー作成</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>