<?php
    //Create PDO Object to connect to the Database
    //localhost here refers to MySQL not Apache-se no port number needed
    $dsn='mysql:host=localhost;dbname=u393143349_moyUSERS';
    $username='u393143349_moyerD2';
    $password='Treefrog184';
    try{
        $pdo2 = new PDO($dsn, $username, $password);
        $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo2->exec('SET NAMES "utf8"');
        //echo '<h4 class="text-center">Connection Established to the Database</h4>';
    } catch (PDOException $e) {
        $error = 'Unable to connect to the database server users.';
        $exceptionError= $e->getMessage();
        include 'errors.php';
        exit();
    }
?>