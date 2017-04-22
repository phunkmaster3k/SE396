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

        $folder = '.'.DIRECTORY_SEPARATOR.'uploads';
        if ( !is_dir($folder) ) {
            die($error = 'Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);


        if (filter_has_var(INPUT_GET, "delete")) {
            $fileName = filter_input(INPUT_GET, 'delete');
            $file = $folder.DIRECTORY_SEPARATOR.$fileName;
            if (is_file($file)) {
                unlink($file);
                $message = "File Deleted";
            } else {
                $error = $fileName . " Does not exist.";
            }
        }
        include './views/header.html.php';
        include './views/list.html.php';
        include './views/errors.html.php';
        include './views/messages.html.php';

        ?>
    </body>
</html>