<?php
        // Insert statement
        function insert_user($user_id,$name,$password,$acc_type) {
            try{
                global $pdo2;
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $SQLinsert =  'INSERT INTO users
                        (userid, name, password, account_type)
                        VALUES
                        (:userid, :name, :password, :account_type)';
                $statement = $pdo2->prepare($SQLinsert);
                $statement->bindValue(':userid', $user_id);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':password', $hash);
                $statement->bindValue(':account_type', $acc_type);
                $statement->execute();
                $statement->closeCursor();
                //echo "Inserted";
            } catch (PDOException $e) {
                
                if($e->getCode() == 23000){
                $error = 'Error Adding Data: ';
                $exceptionError = "The User ID " . $user_id . " already exist.";
                include 'errors.php';
                exit();
                }
                else{
                $error = 'Error Adding User Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
                }
            }
        }
        // see if login is valid
        function is_valid_login($login_user_id,$login_password){
            try{
                global $pdo2;
                $query =  'SELECT password FROM users
                               WHERE userid = :userid';
                $SQLselect = $pdo2->prepare($query);
                $SQLselect->bindValue(':userid', $login_user_id);
                $SQLselect->execute();
                $row = $SQLselect->fetch();
                $SQLselect->closeCursor();
                $hash = $row['password'];
                return password_verify($login_password, $hash);
            } catch (PDOException $e) {
                
                $error = 'Error login User Data: ';
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
            }
            
        }
        // Select get certain user info
        function get_user_info($login_user_id) {
            try{
                global $pdo2;
                $SQLselect = "SELECT userid, name, account_type FROM users
                              WHERE userid=:userid";
                $statement=$pdo2->prepare($SQLselect);
                $statement->bindValue(':userid', $login_user_id);
                $statement->execute();
                $userresults=$statement->fetch();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error = "Error Getting the User's Data: ";
                $exceptionError = $e->getMessage();
                include 'errors.php';
                exit();
            }
            return $userresults;
        }
?>