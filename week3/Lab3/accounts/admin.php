<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <h1>Admin</h1>
        <?php

            include './autoload.php';
            include './views/sessionAccess.html.php';

            $accounts = new Accounts();

            $logout = filter_input(INPUT_GET, 'logout');

            $email = $accounts->getEmail($_SESSION['user_ID']);
         ?>
    <p>Logged in as <?php echo $_SESSION['user_ID'] . ' ' . $email; ?> <a></a></p>
    </body>
</html>