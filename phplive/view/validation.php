<?php
        if (isset($_POST["btnAdd"]) || isset($_POST["btnUpdateSubmit"])) {
            
            
            $errormsgprodid = "";
            $prod_id = filter_input(INPUT_POST, 'txtProdID' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if ($prod_id === ""){
               $errormsgprodid = "<span class='error'> *Required </span>";
            }
            
            else if (is_numeric($prod_id)){
                $errormsgprodid = "<span class='error'> *Must Have Alphabetic Characters </span>";
            }
            
            else if (strlen($prod_id) > 10){
                $errormsgprodid = "<span class='error'> *10 Alphabetic Characters Max </span>";
            }
            
            
            $vend_id = filter_input(INPUT_POST, 'lstVendorName' , FILTER_VALIDATE_INT);
            
            
            $errormsgprodn = "";
            $prod_name = filter_input(INPUT_POST, 'txtProdName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if ($prod_name === ""){
               $errormsgprodn = "<span class='error'> *Required </span>";
            }
            
            else if (is_numeric($prod_name)){
                $errormsgprodn = "<span class='error'> *Must Have Alphabetic Characters </span>";
            }

            else if (strlen($prod_name) > 255){
                $errormsgprodn = "<span class='error'> *255 Alphabetic Characters Max </span>";
            }
            
            
            $errormsgprodprice = "";
            $prod_price = filter_input(INPUT_POST, 'txtProdPrice', FILTER_VALIDATE_FLOAT);

            if ($prod_price === false){
                $errormsgprodprice = "<span class='error'> *Numbers Required </span>";
            }
            
            else if($prod_price < 0.01 || $prod_price > 999999.99){
                $errormsgprodprice = "<span class='error'> *Must be at least 0.01 and Less than 999999.99</span>";
            }
            
            
            $errormsgproddesc = "";
            $prod_desc = filter_input(INPUT_POST, 'txtProdDesc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // Product Description can be NULL
            
    }
?>