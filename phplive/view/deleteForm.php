<!doctype html>
<head>
	<title>Delete Confirmation Page</title>
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

    <h1 class="text-center">Delete Confirmation</h1>
    
    
  <h2 class="h4 text-center">Do you want to delete the product <?php echo htmlspecialchars($prod_name) ?> with the ID <?php echo htmlspecialchars($prod_id) ?>?</h2>
    
  <div class="button-container text-center">
    <form action="" method="post">
        <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>">
        <input type="hidden" name="action" value="delete_product">
        <button id="btnYes" name="btnYes" type="submit" value="Yes" class="btn btn-primary mt-2">Yes</button>
    </form>
    <form action="" method="post">
        <input type="hidden" name="action" value="list_products">
        <button id="btnNo" name="btnNo" type="submit" value="No" class="btn btn-secondary mt-2">No</button>
    </form>
  </div>
    
</main>
</body>
</html>