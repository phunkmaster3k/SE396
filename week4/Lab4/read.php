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

        include './views/header.html.php';

        if (filter_has_var(INPUT_GET, "file")) {


            $fileName = filter_input(INPUT_GET, 'file');

            $file = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $fileName;

            if (is_file($file)) {
                $finfo = new SplFileObject($file, "r");

                if ($finfo->isFile()) {
                    $date = date("l F j, Y, g:i a", $finfo->getMTime());
                    $size = $finfo->getSize();

                    $finfoformime = new finfo;
                    $type = $finfoformime->file($file, FILEINFO_MIME_TYPE);
                }
                include './views/viewFile.html.php';
            }
            else {
                header('Location: display.php');
            }

        }

        ?>

    </body>
</html>