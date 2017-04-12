<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './autoload.php';

        $util = new Util();
        $accounts = new Accounts();

        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        if ($util->isPostRequest()){

            if ( $accounts->signup($email, $password)) {
                echo "worked";
                $util->redirect("login.php");
            }
            else {
                echo "no work";
            }

        }

        include './views/signup.html.php';



        
         ?>
    </body>
</html>