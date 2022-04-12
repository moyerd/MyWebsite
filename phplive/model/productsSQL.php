<?php
        // Select statement
        function get_all_products() {
            try{
                //select products records to display on form
                global $pdo;
                $SQLselect = "select prod_id, vend_id, prod_name, prod_price, prod_desc from products";
                $statement=$pdo->prepare($SQLselect);
                $statement->execute();
                $results=$statement->fetchAll();
                $statement->closeCursor();
                if (empty($results)){
                echo '<h2 class="h4 text-center">Crash Course Database is Empty.</h2>';
                echo '<footer class="text-center"><a href="?action=show_add_form"> <button type="button" class="btn btn-primary mt-2">Add a Product</button></a></footer>';
                exit();
                }
            } catch (PDOException $e) {
                $error = 'Error Getting Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
            }
            return $results;
        }
        // Select get certain product
        function get_product($prod_id) {
            try{
                global $pdo;
                $SQLselect = "select prod_id, vend_id, prod_name, prod_price, prod_desc from products where prod_id=:prod_id";
                $statement=$pdo->prepare($SQLselect);
                $statement->bindValue(':prod_id', $prod_id);
                $statement->execute();
                $results=$statement->fetch();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = "Error Getting the Product's Data: ";
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
            }
            return $results;
        }
        // Insert statement
        function insert_product($prod_id,$vend_id,$prod_name,$prod_price,$prod_desc) {
            try{
                global $pdo;
                $SQLinsert =  'INSERT INTO products
                        (prod_id, vend_id, prod_name, prod_price, prod_desc)
                        VALUES
                        (:prod_id, :vend_id, :prod_name, :prod_price, :prod_desc)';
                $statement = $pdo->prepare($SQLinsert);
                $statement->bindValue(':prod_id', $prod_id);
                $statement->bindValue(':vend_id', $vend_id);
                $statement->bindValue(':prod_name', $prod_name);
                $statement->bindValue(':prod_price', $prod_price);
                $statement->bindValue(':prod_desc', $prod_desc);
                $statement->execute();
                $statement->closeCursor();
                //echo "Inserted";
            } catch (PDOException $e) {
                if($e->getCode() == 23000){
                $error = 'Error Adding Data: ';
                $exceptionError = "The Product ID " . $prod_id . " already exist.";
                include 'errors.php';
                exit();
                }
                else{
                $error = 'Error Adding Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
                }
            }
        }
        // Update statement
        function update_product($prod_id,$vend_id,$prod_name,$prod_price,$prod_desc) {    
            // Can't update Primary Key
            try{
                global $pdo;
                $SQLupdate =  'UPDATE products
                        SET vend_id = :vend_id,
                            prod_name = :prod_name,
                            prod_price = :prod_price,
                            prod_desc = :prod_desc
                        WHERE prod_id = :prod_id;';
                $statement = $pdo->prepare($SQLupdate);
                $statement->bindValue(':vend_id', $vend_id);
                $statement->bindValue(':prod_name', $prod_name);
                $statement->bindValue(':prod_price', $prod_price);
                $statement->bindValue(':prod_desc', $prod_desc);
                $statement->bindValue(':prod_id', $prod_id);
                $statement->execute();
                $statement->closeCursor();
                //echo "Updated";
            } catch (PDOException $e) {
                $error = 'Error Updating Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
            }
        }
        // Delete statement
        function delete_product($prod_id) {
            try{
                if ($prod_id != false){
                global $pdo;
                $SQLdelete =  'DELETE FROM products
                        WHERE prod_id = :prod_id';
                $statement = $pdo->prepare($SQLdelete);
                $statement->bindValue(':prod_id', $prod_id);
                $success = $statement->execute();
                $statement->closeCursor();
                //echo "Deleted";
                }
            } catch (PDOException $e) {
                if($e->getCode() == 23000){
                $error = 'Error Deleting Data: ';
                $exceptionError = "The Product ID " . $prod_id . " cannot be deleted at this time.";
                include 'errors.php';
                exit();
                }
                else{
                $error = 'Error Deleting Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
                }
            }
        }
        function sqlSelect() {
            try{
                //select products records to display on form
                global $pdo;
                $SQLselect = "select prod_id, vend_id, prod_name, prod_price, prod_desc from products";
                $statement=$pdo->prepare($SQLselect);
                $statement->execute();
                $results=$statement->fetchAll();
                $statement->closeCursor();
                return $results;
            } catch (PDOException $e) {
                $error = 'Error Getting Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
            }
        }
        function firstLetter($prodName) {
            try {
                global $pdo;
                $SQLSelect = 'SELECT prod_id, vend_id, prod_name, prod_price, prod_desc FROM products 
                              WHERE prod_name like "' . $prodName . '%"
                              ORDER BY prod_name';
                $statement = $pdo->prepare($SQLSelect);
                $statement->bindValue('prodName',$prodName);
                $statement->execute();
                $result =  $statement->fetchAll();
                $statement->closeCursor();
                return $result;
            } catch (PDOException $e) {
                $error = "Error";
                $exceptionError = $e->getMessage();
                include 'View/errors.php';
                exit();   
            }
        }
        function vendorSelect($vendID) {
            try {
                global $pdo;
                $SQLSelect = 'SELECT prod_id, vend_id, prod_name, prod_price, prod_desc FROM products
                              WHERE vend_id = :vendID
                              ORDER BY vend_id';
                $statement = $pdo->prepare($SQLSelect);
                $statement->bindValue('vendID',$vendID);
                $statement->execute();
                $result =  $statement->fetchAll();
                $statement->closeCursor();
                return $result;
            } catch (PDOException $e) {
                $error = "Error";
                $exceptionError = $e->getMessage();
                include 'View/errors.php';
                exit();   
            }
        }
        function lessThan($prodPrice) {
            try {
                global $pdo;
                $SQLSelect = 'SELECT prod_id, vend_id, prod_name, prod_price, prod_desc FROM products
                              WHERE prod_price < :prodPrice
                              ORDER BY prod_price';
                $statement = $pdo->prepare($SQLSelect);
                $statement->bindValue('prodPrice',$prodPrice);
                $statement->execute();
                $result =  $statement->fetchAll();
                $statement->closeCursor();
                return $result;
            } catch (PDOException $e) {
                $error = "Error";
                $exceptionError = $e->getMessage();
                include 'View/errors.php';
                exit();  
            }
        }
        function greaterThan($prodPrice) {
            try {
                global $pdo;  
                $SQLSelect = 'SELECT prod_id, vend_id, prod_name, prod_price, prod_desc FROM products
                              WHERE prod_price > :prodPrice';
                $statement = $pdo->prepare($SQLSelect);
                $statement->bindValue('prodPrice',$prodPrice);
                $statement->execute();
                $result =  $statement->fetchAll();
                $statement->closeCursor();
                return $result;
            } catch (PDOException $e) {
                $error = "Error";
                $exceptionError = $e->getMessage();
                include 'View/errors.php';
                exit();   
            }
        }
?>