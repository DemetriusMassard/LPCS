<?php
    
    
        require 'changeFolder.php';
        $config = require "config.php";
        $server = $config['server'];
        $user = $config['user'];
        $pass = $config['pass'];
        $db = $config['db'];

        $sql = "select * from paths where prevID = (select id from paths where ID = " . @$_SESSION['folder'] . ")";
        try{    
            $conn = new mysqli($server, $user, $pass, $db);
            $result = $conn->query($sql);
            if($result->num_rows >0){
                while ($row = $result->fetch_assoc()){
                    echo 'Pasta: '. $row['ID'] .', '. $row['name'] . "<button class='btn btn-primary' value= ". $row['ID'] . " type='button'>O</button><br>";
                }
            }
            $conn->close();
        }catch(mysqli_sql_exception $e){
            echo "Error code: ". $e->getCode() . "<br>";
            echo "Error message: ". $e->getMessage();
            
        }

?>

        <script>
            $('.btn').click(function(){
                //alert($(this).attr('value'));
                $.ajax({
                    url:'back/files.php',
                    type:'POST',
                    data: {
                        folder: $(this).attr('value')
                    },
                    success:function (response){
                        console.log(response);
                        $('#files').html(response);
                    }
                })
            })
        </script>