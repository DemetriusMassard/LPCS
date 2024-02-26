<html>
    <head>
        <?php
            require ('back\verifylogin.php');
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            body{
                background-color: #444444;
            }
            #box{
                background-color: #6666aa;
            }
            #content{
                margin:auto;
                height:100%;
                background-color: #999999;
            }
            .align-items-center{
                align-items: center;
            }
        </style>
    </head>
    <body>
        <div class="container-xl" id="content">
            <div class="row justify-content-center align-items-center">
                <div id="box" class="col-md-8">
                    <h1>test</h1>
                    <?php
                        if (session_status() == PHP_SESSION_ACTIVE) {
                            echo 'Session is active';
                        }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>