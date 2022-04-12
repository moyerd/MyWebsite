<!doctype html>
<head>
	<title>Create Account Page</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="styles/main.css" type="text/css">
</head>
<body>
<main>
    <h1 class="text-center">Enter Your Account Information</h1>
		<form method="post" name="frmCreateAcc" action="">
			<div class="form-group">
				<label for="txtUserID">User ID:</label>
                                <?php 
                                if (isset($_POST["btnCreateAcc"]) && !empty($errormsguserid)){
                                    echo $errormsguserid;
                                }
                                ?>
				<input type="text" class="form-control bg-faded-4" id="txtUserID" placeholder="Enter User ID" name="txtUserID" 
                                       value="<?php 
                                       if (isset($_POST['txtUserID']) && empty($errormsguserid) && empty($errormsgname) && empty($errormsgpassword)){echo "";}
                                       else if (isset($_POST['txtUserID']) && empty($errormsguserid)) {echo htmlspecialchars($user_id);} ?>">
			</div>
			<div class="form-group">
				<label for="txtName">Name:</label>
                                <?php 
                                if (isset($_POST["btnCreateAcc"]) && !empty($errormsgname)){
                                    echo $errormsgname;
                                }
                                ?>
				<input type="text" class="form-control bg-faded-4" id="txtName" placeholder="Enter your Name" name="txtName" 
                                       value="<?php
                                       if (isset($_POST['txtName']) && empty($errormsguserid) && empty($errormsgname) && empty($errormsgpassword)){echo "";}
                                       else if (isset($_POST['txtName']) && empty($errormsgname)) {echo htmlspecialchars($name);} ?>">
			</div>
			<div class="form-group">
				<label for="txtPassword">Password:</label>
                                <?php
                                     if (isset($_POST["btnCreateAcc"]) && !empty($errormsgpassword)){
                                        echo $errormsgpassword;
                                    }
                                ?>
				<input type="password" class="form-control bg-faded-4" id="txtPassword" placeholder="Enter Password" name="txtPassword" 
                                       value="<?php
                                       if (isset($_POST['txtPassword']) && empty($errormsguserid) && empty($errormsgname) && empty($errormsgpassword)){echo "";}
                                       else if (isset($_POST['txtPassword']) && empty($errormsgpassword)) {echo htmlspecialchars($password);} ?>">
			</div>
			<div class="form-group">
				<fieldset><legend>Account Type</legend>
					<input type="radio" name="radAccType" id="radNonAdmin" value="NonAdmin"
                                               <?php if (isset($_POST['radAccType']) && $_POST['radAccType'] == "NonAdmin") echo 'checked="checked"';?>
                                               checked><label for="radNonAdmin">Non-Admin</label>
					<input type="radio" name="radAccType" id="radAdmin" value="Admin"
                                               <?php if (isset($_POST['radAccType']) && $_POST['radAccType'] == "Admin") echo 'checked="checked"';?>
                                               ><label for="radAdmin">Admin</label>
				</fieldset>
			</div>
			<div class="form-group text-center">
                                <input type="hidden" name="action" value="acc_create">
				<button id="btnCreateAcc" name="btnCreateAcc" type="submit" value="Create Account" class="btn btn-primary mt-2">Create Account</button>
			</div>
		</form>
</main>
</body>
</html>