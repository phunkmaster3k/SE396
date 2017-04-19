<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        if(isset($_GET['file'])) {
            $fileName = $_GET['file'];
        }

        $file = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $fileName;

        $finfo = new SplFileInfo($file);

        if ( $finfo->isFile() ) {
            $date = date("l F j, Y, g:i a", $finfo->getMTime());
            $size = $finfo->getSize();
            $type = $finfo->getExtension();

        }





        ?>
    </body>
</html>