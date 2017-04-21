<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        $folder = '.'.DIRECTORY_SEPARATOR.'uploads';
        if ( !is_dir($folder) ) {
            die($error = 'Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);


        if (isset($_GET['delete'])) {
            $file = $folder.DIRECTORY_SEPARATOR.filter_input(INPUT_GET, 'delete');
            if (is_file($file)) {
                unlink($file);
                $message = "File Deleted";
            } else {
                $error = filter_input(INPUT_GET, 'delete') . " Does not exist.";
            }

        }



        include './views/list.html.php';
        include './views/errors.html.php';
        include './views/messages.html.php';

        ?>
    </body>
</html>