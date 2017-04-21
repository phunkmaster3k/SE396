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

        $finfo = new SplFileObject($file, "r");

        //$finfox = new finfo;
        //$mime = $finfox->file($file, FILEINFO_MIME);

        if ( $finfo->isFile() ) {
            $date = date("l F j, Y, g:i a", $finfo->getMTime());
            $size = $finfo->getSize();
            $type = $finfo->getExtension();

            echo $date.'<br />';
            echo $size.'<br />';
            echo $type.'<br />';

            /* if ( $type == 'jpg' || $type == 'gif' || $type == 'png' ){
                echo '<img src="'.$file.'" />';
            }
            else if ($type == 'txt') {
                echo '<textarea>'.$finfo->fread($size).'</textarea>';
            }
            else if ($type == 'html' || $type == 'pdf') {
                echo '<object width=900px height=500px data="'.$file.'"></object>';
            }
            else {
                echo '<a href="'.$file.'">Download file</a>';
            } */




        }

        include './views/viewFile.html.php';







        ?>

    </body>
</html>