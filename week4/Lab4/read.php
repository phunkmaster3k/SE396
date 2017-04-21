<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        if(isset($_GET['file'])) {
            $fileName = filter_input(INPUT_GET, 'file');

            $file = '.' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $fileName;

            $finfo = new SplFileObject($file, "r");

            //$finfox = new finfo;
            //$type = $finfox->file($file, FILEINFO_MIME);

            if ($finfo->isFile()) {
                $date = date("l F j, Y, g:i a", $finfo->getMTime());
                $size = $finfo->getSize();
                $type = $finfo->getExtension();


            }
        }

        include './views/viewFile.html.php';







        ?>

    </body>
</html>