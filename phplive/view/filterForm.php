<!doctype html>
<head>
	<title>Filter Products Page</title>
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

    <h1 class="text-center">Filter Products</h1>
    
    
		<form method="post" name="frmFilter" action="">
			<div class="form-group">
				<label for="prodName">First Letter of Product Name:</label>
				<input type="text" class="form-control bg-faded-4" id="prodName" placeholder="Enter First Letter of Product Name" name="prodName">
			</div>
			<div class="form-group">
                            
				<label for="vendID">Select Vendor Name:</label>
				<select id="vendID" name="vendID" class="form-control">
                                    <?php foreach ($vendors as $one_row){ ?>
					<option value="<?php echo $one_row["vend_id"]; ?>"
                                            <?php if (!empty($_POST['vendID']) && $_POST['vendID'] == $one_row['vend_id']) { echo 'selected'; } ?>>
                                            <?php echo $one_row["vend_name"]; ?></option>
                                    <?php } ?>
				</select>
			</div>
                        <div class="form-group">
                            <label for='prodPrice'>Product Price:</label>
                            <input name='prodPrice' id='prodPrice' class="form-control bg-faded-4" placeholder="Enter Product Price">
                        </div>
                    	<div class="form-group">
                            <fieldset><legend>Greater than or Less than Price</legend>
                            <label for='GT'>Greater than</label>
                            <input type='radio' id='GT' name='symbol' value='GT' checked>
                            <label for='LT'>Less than</label>
                            <input type='radio' id='LT' name='symbol' value='LT'>
                            </fieldset>
			</div>
            <div class="button-container text-center">
                                <input type="hidden" name="action" value="filter_product">
				<button id="btnFilter" name="btnFilter" type="submit" value="Filter" class="btn btn-primary mt-2" >Filter</button>
		</form>
                <form action="" method="post">
                    <input type="hidden" name="action" value="list_products">
                    <button id="btnCreateAccPage" name="btnProductsListing" type="submit" value="Products Listing" class="btn btn-secondary mt-2">Products Listing</button>
                </form>
            </div>
</main>
</body>
</html>