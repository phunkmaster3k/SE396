<ul>
    <li>File Name: <?php echo $_GET['file'] ?></li>
    <li>File Size: <?php echo $size ?></li>
    <li>File Type: <?php echo $type ?></li>
    <li>Created on: <?php echo $date ?></li>
</ul>

<?php if($type == 'jpg' || $type == 'gif' || $type == 'png'): ?>
    <img src="<?php echo $file ?>" />
<?php elseif ($type == 'txt'): ?>
    <textarea cols="50" rows="10"> <?php echo $finfo->fread($size) ?></textarea>
<?php elseif ($type == 'html' || $type == 'pdf'): ?>
    <object width=900px height=500px data="<?php echo $file ?>"></object>
<?php else: ?>
    <a href="<?php echo $file ?>"> Download file</a>
<?php endif; ?>

