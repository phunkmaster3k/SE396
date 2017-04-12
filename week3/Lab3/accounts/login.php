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
        session_start();
        include './autoload.php';

        $util = new Util();
        $accounts = new Accounts();

        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $errors = [];

        if ($util->isPostRequest()){

            $loginInfo = $accounts->login($email, $password );

            if  ( $loginInfo > 0)  {
                $_SESSION['user_ID'] = $loginInfo;
                $util->redirect("admin.php");
            }
            else {
                $errors[] = 'Invalid Login, Try again';
            }

        }

        if(isset($_GET['logout'])) {
            session_destroy();
        }

        include './views/header.html.php';
        include './views/login.html.php';
        include './views/errors.html.php';

?>


</body>
</html>