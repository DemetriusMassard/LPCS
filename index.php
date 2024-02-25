<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <div class="align-items-center">
                <div class="row justify-content-center align-items-center">
                    <div id="box" class="col-md-8">
                        <form id="login-form" class="form" action="register.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="user" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="pass" id="pass" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="pass2" id="pass2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="text-info">Genero:</label><br>
                                <select class="custom-select" name="gender">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>