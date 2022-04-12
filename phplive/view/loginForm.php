<!doctype html>
<head>
	<title>Account Login Page</title>
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

    <h1 class="text-center">Account Login</h1>
    <?php if (isset($_SESSION['is_valid']))
    {echo "<h2 class='text-center'>The User " . htmlspecialchars($_SESSION['userid']) . " logged in already click Logout to login into a different account</h2>";} ?>
    <?php if (!isset($_SESSION['is_valid']))
    {echo "<h2 class='text-center'>Login to access Product Listing</h2>";} ?>
    
		<form method="post" name="frmLogin" action="">
			<div class="form-group">
				<label for="txtUserIDlogin">User ID:</label>
                                <?php 
                                if (isset($_POST["btnLogin"]) && !empty($errormsglogin)){
                                    echo $errormsglogin;
                                }
                                ?>
				<input <?php if (isset($_SESSION['is_valid'])){echo 'disabled';} ?> type="text" class="form-control bg-faded-4" id="txtUserIDlogin" placeholder="Enter User ID" name="txtUserIDlogin">
			</div>
			<div class="form-group">
				<label for="txtPasswordlogin">Password:</label>
				<input <?php if (isset($_SESSION['is_valid'])){echo 'disabled';} ?> type="password" class="form-control bg-faded-4" id="txtPasswordlogin" placeholder="Enter Password" name="txtPasswordlogin">
			</div>      
     <div class="button-container text-center">
                                <input type="hidden" name="action" value="acc_login">
				<button id="btnAdd" name="btnLogin" type="submit" value="Add" class="btn btn-primary mt-2"
                                    <?php if (isset($_SESSION['is_valid'])){echo 'disabled';} ?>
                                        >Login</button>
                    
		</form>

                <form action="" method="post">
                    <input type="hidden" name="action" value="acc_logout">
                    <button id="btnLogout" name="btnLogout" type="submit" value="Logout" class="btn btn-danger mt-2" 
                        <?php if (!isset($_SESSION['is_valid'])){echo 'disabled';} ?>
                            >Logout</button>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="action" value="show_create_page">
                    <button id="btnCreateAccPage" name="btnCreateAccPage" type="submit" value="Create Account" class="btn btn-secondary mt-2">Create Account</button>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="action" value="list_products">
                    <button id="btnCreateAccPage" name="btnProductsListing" type="submit" value="Products Listing" class="btn btn-info mt-2"
                        <?php if (!isset($_SESSION['is_valid'])){echo 'hidden';} ?>
                            >Products Listing</button>
                </form>
      </div>
</main>
</body>
</html>