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

        if ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' ) {

            $uploader = new uploader();

            try {
                $fileName = $uploader->upLoad('upfile');

            } catch (RuntimeException $e) {
                $error = $e->getMessage();
            }

            if ( isset($fileName) ){
                $message = $fileName . " Uploaded";
            }
        }
        include './views/header.html.php';
        include './views/form-upload.html.php';
        include './views/messages.html.php';
        include './views/errors.html.php';



        ?>

    </body>
</html>