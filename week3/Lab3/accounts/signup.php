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

        $errors = [];

        if ($util->isPostRequest()){

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

        include './views/signup.html.php';
        include './views/errors.html.php';



        
         ?>
    </body>
</html>