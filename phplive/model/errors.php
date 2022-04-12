<!doctype html>
<head>
	<title>Error Information</title>
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
    <h1 class="text-center">Something Went Wrong</h1>
    <ul class="error">
        <?php
        echo "<li>" . $error . "</li>";
        echo "<li>" . $exceptionError . "</li>";
        ?>
    </ul>
        <footer class="text-center">
            <!--
            A different method of going to show_add_form
            <a href="?action=show_add_form"> <button type="button" class="btn btn-primary mt-2">Add a Product</button></a>
            -->
            <form action="" method="POST">
                <input type="hidden" name="action" value="list_products">
                <input type="submit" value="Go Back" name="btnProductsPage" class="btn btn-primary mt-2">
            </form> 
        </footer>
</main>
</body>
</html>