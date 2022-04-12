<?php
    //Create PDO Object to connect to the Database
    //localhost here refers to MySQL not Apache-se no port number needed
    $dsn='mysql:host=localhost;dbname=u393143349_crashcourse';
    $username='u393143349_moyerD';
    $password='Treefrog184';
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
        //echo '<h4 class="text-center">Connection Established to the Database</h4>';
    } catch (PDOException $e) {
        $error = 'Unable to connect to the database server crash course.';
        $exceptionError= $e->getMessage();
        include 'errors.php';
        exit();
    }
?>