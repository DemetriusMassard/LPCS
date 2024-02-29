<html>
    <head>
        <?php
            @session_start();
            if(session_status()==PHP_SESSION_ACTIVE){
                session_destroy();
            }
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        
        <style>
            body{
                background-color: #444444;
            }
            #box{
                background-color: #6666aa;
                padding: 20px;
            }
            #viewFrame{
                margin:auto%;
                height:100%;
                background-color: #999999;
            }
            #content{
                height:100%;
            }
        </style>
    </head>
    <body>
        <div class="container-xl" id="viewFrame">
            <div class="row justify-content-md-center align-items-center" id="content">
                <div id="box" class="col-md-4">
                    <form id="login-form" class="form" action="back\login.php" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="user" id="username" class="form-control"><br>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="pass" id="pass" class="form-control"><br>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>