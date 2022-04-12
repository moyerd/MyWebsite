<?php
        if (isset($_POST["btnCreateAcc"])) {
            $errormsguserid = "";
            $user_id = filter_input(INPUT_POST, 'txtUserID' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if ($user_id === ""){
               $errormsguserid = "<span class='error'> *Required </span>";
            }
            
            else if (strlen($user_id) > 10){
                $errormsguserid = "<span class='error'> *10 Characters Max </span>";
            }
            
            $errormsgname = "";
            $name = filter_input(INPUT_POST, 'txtName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if ($name === ""){
               $errormsgname = "<span class='error'> *Required </span>";
            }
            
            else if (is_numeric($name)){
                $errormsgname = "<span class='error'> *Must Have Alphabetic Characters </span>";
            }

            else if (strlen($name) > 15){
                $errormsgname = "<span class='error'> *15 Alphabetic Characters Max </span>";
            }
            
            // values must contain at least one digit and at least one uppercase letter and can be from 4 to 10 characters  1D11
            $errormsgpassword = "";
            $password = filter_input(INPUT_POST, 'txtPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $passwordmatch = preg_match('/^(?=.*\d)(?=.*[A-Z])[a-zA-Z\d]{4,10}$/', $password);
            
            if ($password === ""){
               $errormsgpassword = "<span class='error'> *Required </span>";
            }

            else if ($passwordmatch === 0) {
                $errormsgpassword = "<span class='error'> *Must have 1 digit & 1 uppercase letter & 4-10 Characters </span>";
            }

            $acc_type = filter_input(INPUT_POST, 'radAccType' , FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    }
?>