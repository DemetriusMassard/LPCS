<?php

    $config = require "config.php";
    $userUsername = $_POST["user"];
    $userPass = $_POST["pass"];
    $addr = $_SERVER['SERVER_NAME'];

    $pepper = $config['pepper'];
    $userPassPeppered = hash_hmac("sha256", $userPass,$pepper);

    $server = $config['server'];
    $user = $config['user'];
    $pass = $config['pass'];
    $db = $config['db'];
    
    $sql = "select * from users where upper(user) = '" . strtoupper($userUsername) . "'";
    
    try{    
        $conn = new mysqli($server, $user, $pass, $db);
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            while ($row = $result->fetch_assoc()){
                
                if(password_verify($userPassPeppered, $row['pass'])){
                    @session_start();
                    header('location:..\dashboard.php');
                    exit();
                }else{
                    header('location:..\index.php');
                    exit();
                }
            }
        }
        $conn->close();
    }catch(mysqli_sql_exception $e){
        echo "Error code: ". $e->getCode() . "<br>";
        echo "Error message: ". $e->getMessage();
        
    }