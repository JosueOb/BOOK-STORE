<?php
if($_POST){
    header('Location:dashboard.php');//redirect
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <br/><br/><br/>
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                                   aria-describedby="help-email">
                            <small id="help-email" class="text-muted">Typing your address email</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                                   aria-describedby="help-password">
                            <small id="help-password" class="text-muted">Typing your password</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </form>

                </div>
            </div>
        </div>
        
    </div>
</div>
</body>
</html>