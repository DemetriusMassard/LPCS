<?php
    $sql = "select * from paths where prevID = 1 AND name = '" . $_SESSION["user"] . "'";

    try{    
        $conn = new mysqli($server, $user, $pass, $db);
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            while ($row = $result->fetch_assoc()){
                $_SESSION['rootFolder'] = $row['ID'];
                $_SESSION['prevFolder'] = $row['ID'];
                $_SESSION['currentFolder'] = $row['ID'];
                $_SESSION['folders'] = [];
                $sql = "select * from paths where prevID = '" . $row['ID'] . "'";
                $folders = $conn->query($sql);
                $i = 0;
                if($folders->num_rows > 0){
                    while ($row = $folders->fetch_assoc()){
                        $_SESSION["folders"][$i] = array(
                            'id' => $row["ID"],
                            'name' => $row['name']);
                        $i++;
                    }
                }
            }
        }
        $conn->close();
    }catch(mysqli_sql_exception $e){
        echo "Error code: ". $e->getCode() . "<br>";
        echo "Error message: ". $e->getMessage();
        
    }