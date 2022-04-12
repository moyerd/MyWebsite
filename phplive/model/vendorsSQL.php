<?php
        // Select statement
        function get_all_vendors() {
            try{
                global $pdo;
                $SQLselectvendors = "select vend_id, vend_name from vendors";
                $statement=$pdo->prepare($SQLselectvendors);
                $statement->execute();
                $results=$statement->fetchAll();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = 'Error Getting Vendor Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
            }
            return $results;
        }
?>