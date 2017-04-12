<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    </head>
    <body>

        <?php

            include './autoload.php';
            include './views/sessionAccess.html.php';
            include './views/header.html.php';

            $accounts = new Accounts();
            $email = $accounts->getEmail($_SESSION['user_ID']);
         ?>
        <div class="container">
            <h1>Admin</h1>
            <p>Logged in as <br />
                User ID: <?php echo $_SESSION['user_ID']?> <br />
                Email: <?php echo $email?></p>
            <a class="btn btn-default" href="login.php?logout">Log-out</a>
        </div>
    </body>
</html>