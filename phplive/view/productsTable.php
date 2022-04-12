<!doctype html>
<head>
	<title>Products Listing Information Page</title>
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

    <h1 class="text-center">Hello <?php echo " " . htmlspecialchars($_SESSION['name']) . ", "?> Welcome to Products Listing Information</h1>
    <?php if($_SESSION['account_type'] === "NonAdmin")
    {echo "<h2 class='text-center'>Non-Admins can not update or delete products</h2>";} ?>
        
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Vendor ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Description</th>
                <th scope="col" <?php if($_SESSION['account_type'] === "NonAdmin"){echo "hidden";} ?>>Update</th>
                <th scope="col" <?php if($_SESSION['account_type'] === "NonAdmin"){echo "hidden";} ?>>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $one_row){ ?>
            <tr>
                <td><?php echo $one_row["prod_id"]; ?></td>
                <td><?php echo $one_row["vend_id"]; ?></td>
                <td><?php echo $one_row["prod_name"]; ?></td>
                <td><?php echo $one_row["prod_price"]; ?></td>
                <td><?php echo $one_row["prod_desc"]; ?></td>
                <td <?php if($_SESSION['account_type'] === "NonAdmin"){echo "hidden";} ?>>
                    <form id="buttonform" action="" method="post"> 
                        <input type="hidden" name="action" value="show_update_form">
                        <input type="hidden" name="prod_id" value="<?php echo $one_row["prod_id"]; ?>">
                       <input  name="btnUpdateForm" type="submit" value="Update" class="btn btn-primary btn-sm">
                    </form>
                </td>
                <td <?php if($_SESSION['account_type'] === "NonAdmin"){echo "hidden";} ?>>
                    <form id="buttonform" action="" method="post"> 
                        <input type="hidden" name="action" value="show_deleteconfirm">
                        <input type="hidden" name="prod_id" value="<?php echo $one_row["prod_id"]; ?>">
                        <input type="hidden" name="prod_name" value="<?php echo $one_row["prod_name"]; ?>">
                       <input  name="btnDelete" type="submit" value="Delete" class="btn btn-secondary btn-sm">
                    </form> 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
        <footer class="text-center">
            <!--
            A different method of going to show_add_form
            <a href="?action=show_add_form"> <button type="button" class="btn btn-primary mt-2">Add a Product</button></a>
            -->
        <div class="button-container text-center">
            <form action="" method="POST">
                <input type="hidden" name="action" value="show_add_form">
                <input type="submit" value="Add a Product" name="btnInsertForm" class="btn btn-primary mt-2">
            </form>
            <form action="" method="POST">
                <input type="hidden" name="action" value="show_filter_form">
                <input type="submit" value="Filter Products" name="btnFilterForm" class="btn btn-secondary mt-2">
            </form>
            <form action="" method="POST">
                <input type="hidden" name="action" value="show_login">
                <input type="submit" value="Login Page" name="btnLoginForm" class="btn btn-info mt-2">
            </form>
        </div>
        </footer>
    
</main>
</body>
</html>