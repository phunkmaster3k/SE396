<?php

$folder = './uploads';
if ( !is_dir($folder) ) {
    die('Folder <strong>' . $folder . '</strong> does not exist' );
}
$directory = new DirectoryIterator($folder);

?>

<ol>
    <?php foreach ($directory as $fileInfo) : ?>
        <?php if ( $fileInfo->isFile() ) : ?>
            <li>
                <?php echo $fileInfo->getFilename(); ?>
                <input type="submit" value="View" />
                <input type="submit" value="Delete" />
            </li>
        <?php endif; ?>
    <?php endforeach; ?>

</ol>