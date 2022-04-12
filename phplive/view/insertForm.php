<!doctype html>
<head>
	<title>Add Product Info. Page</title>
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

    <h1 class="text-center">Enter Your Product Information</h1>
    
    
		<form method="post" name="frmInsert" action="">
			<div class="form-group">
				<label for="txtProdID">Product ID (10 Characters):</label>
                                <?php 
                                if (isset($_POST["btnAdd"]) && !empty($errormsgprodid)){
                                    echo $errormsgprodid;
                                }
                                ?>
				<input type="text" class="form-control bg-faded-4" id="txtProdID" placeholder="Enter Product ID" name="txtProdID" 
                                       value="<?php 
                                       if (isset($_POST['txtProdID']) && empty($errormsgprodid) && empty($errormsgprodn) && empty($errormsgprodprice) && empty($errormsgproddesc)){echo "";}
                                       else if (isset($_POST['txtProdID']) && empty($errormsgprodid)) {echo htmlspecialchars($prod_id);} ?>">

			</div>
			<div class="form-group">
                            
				<label for="lstVendorName">Select Vendor Name:</label>
				<select id="lstVendorName" name="lstVendorName" class="form-control">
                                    <?php foreach ($vendors as $one_row){ ?>
					<option value="<?php echo $one_row["vend_id"]; ?>"
                                            <?php if (!empty($_POST['lstVendorName']) && $_POST['lstVendorName'] == $one_row['vend_id']) { echo 'selected'; } ?>>
                                            <?php echo $one_row["vend_name"]; ?></option>
                                    <?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="txtProdName">Product Name:</label>
                                <?php 
                                if (isset($_POST["btnAdd"]) && !empty($errormsgprodn)){
                                    echo $errormsgprodn;
                                }
                                ?>
				<input type="text" class="form-control bg-faded-4" id="txtProdName" placeholder="Enter Product Name" name="txtProdName" 
                                       value="<?php
                                       if (isset($_POST['txtProdName']) && empty($errormsgprodid) && empty($errormsgprodn) && empty($errormsgprodprice) && empty($errormsgproddesc)){echo "";}
                                       else if (isset($_POST['txtProdName']) && empty($errormsgprodn)) {echo htmlspecialchars($prod_name);} ?>">

			</div>
			<div class="form-group">
				<label for="txtProdPrice">Product Price:</label>
                                <?php
                                     if (isset($_POST["btnAdd"]) && !empty($errormsgprodprice)){
                                        echo $errormsgprodprice;
                                    }
                                ?>
				<input type="text" class="form-control bg-faded-4" id="txtProdPrice" placeholder="Enter Product Price" name="txtProdPrice" 
                                       value="<?php
                                       if (isset($_POST['txtProdPrice']) && empty($errormsgprodid) && empty($errormsgprodn) && empty($errormsgprodprice) && empty($errormsgproddesc)){echo "";}
                                       else if (isset($_POST['txtProdPrice']) && empty($errormsgprodprice)) {echo htmlspecialchars($prod_price);} ?>">

			</div>
			<div class="form-group">
				<label for="txtProdDesc">Product Description (Optional):</label>
                                <?php
                                     if (isset($_POST["btnAdd"]) && !empty($errormsgproddesc)){
                                        echo $errormsgproddesc;
                                    }
                                ?>
				<input type="text" class="form-control bg-faded-4" id="txtProdDesc" placeholder="Enter Product Description" name="txtProdDesc" 
                                       value="<?php
                                       if (isset($_POST['txtProdDesc']) && empty($errormsgprodid) && empty($errormsgprodn) && empty($errormsgprodprice) && empty($errormsgproddesc)){echo "";}
                                       else if (isset($_POST['txtProdDesc']) && empty($errormsgproddesc)) {echo htmlspecialchars($prod_desc);} ?>">

			</div>
			<div class="form-group text-center">
                                <input type="hidden" name="action" value="add_product">
				<button id="btnAdd" name="btnAdd" type="submit" value="Add" class="btn btn-primary mt-2">Add</button>
			</div>
		</form>
    
</main>
</body>
</html>