<?php

    $config = require "config.php";
    $userUsername = $_POST["user"];
    $userPass = $_POST["pass"];
    
    $server = $config['server'];
    $user = $config['user'];
    $pass = $config['pass'];
    $db = $config['db'];
    
    $sql = "select * from users where upper(user) = '" . strtoupper($userUsername) . "'";
    
    try{    
        $conn = new mysqli($server, $user, $pass, $db);
        $result = $conn->query($sql);
        echo '<script language="javascript">';
        echo 'alert("' . $result->num_rows . '")';
        echo '</script>';
        if($result->num_rows == 1){
            while ($row = $result->fetch_assoc()){
                if(password_verify($userPass, $row['pass'])){
                    echo "1";
                }else{
                    echo "0";
                }
            }
        }
        $conn->close();
    }catch(mysqli_sql_exception $e){
        echo "Error code: ". $e->getCode() . "<br>";
        echo "Error message: ". $e->getMessage();
        
    }