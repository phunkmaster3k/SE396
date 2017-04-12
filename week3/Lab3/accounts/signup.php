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

        $util = new Util();
        $accounts = new Accounts();


        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $errors = [];

        if ($util->isPostRequest()){

            if ( empty($password)) {
                $errors[] = 'Password is Required.';
            }

            $validation = new Validation();

            if ( $validation->isEmailValid($email) === false) {
                $errors[] = 'Invalid Email';
            }
            else if ( $accounts->uniqueEmail($email) === false){
                $errors[] = 'Duplicate Email';
            }

            if ( count($errors) === 0 ) {
                if ( $accounts->signup($email, $password)) {
                    $util->redirect("login.php");
                }
                else {
                    $errors[] = 'Could not add account';
                }
            }
        }

        include './views/header.html.php';
        include './views/signup.html.php';
        include './views/errors.html.php';




        
         ?>
    </body>
</html>