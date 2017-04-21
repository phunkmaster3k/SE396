<ol>
    <?php foreach ($directory as $fileInfo) : ?>
        <?php if ( $fileInfo->isFile() ) : ?>
            <li>
                <?php echo $fileInfo->getFilename(); ?>
                <a href="read.php?file=<?php echo $fileInfo->getFilename(); ?>" class = "btn btn-default btn-sm">View</a>
                <a href="?delete=<?php echo $fileInfo->getFilename(); ?>" class = "btn btn-default btn-sm">Delete</a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ol>
