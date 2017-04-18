<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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

        include './views/form-upload.html.php';
        include './views/messages.html.php';
        include './views/errors.html.php';



        ?>

    </body>
</html>