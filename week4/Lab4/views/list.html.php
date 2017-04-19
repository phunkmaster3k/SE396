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
                <a href="read.php?file=<?php echo $fileInfo->getFilename(); ?>" class = "btn btn-default btn-sm">View</a>

            </li>
        <?php endif; ?>
    <?php endforeach; ?>

</ol>