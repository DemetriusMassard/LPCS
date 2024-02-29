<?php

    $config = require "config.php";
    $userUsername = htmlspecialchars($_POST["user"],FILTER_FLAG_ENCODE_AMP);
    $userPass = htmlspecialchars($_POST["pass"],FILTER_FLAG_ENCODE_AMP);
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
                    $_SESSION['user'] = $userUsername;
                    
                    header ('location:http://'. $_SERVER['HTTP_HOST'] .'/lpcs/dashboard.php');
                    exit();
                }else{
                    header('location:http://'. $_SERVER['HTTP_HOST'] .'/lpcs/index.php');
                    exit();
                }
            }
        }
        $conn->close();
    }catch(mysqli_sql_exception $e){
        echo "Error code: ". $e->getCode() . "<br>";
        echo "Error message: ". $e->getMessage();
        
    }