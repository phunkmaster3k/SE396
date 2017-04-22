<div class="container">
<ul>
    <li>
        File Name: <?php echo $fileName ?>
    </li>
    <li>File Size: <?php echo $size ?> bytes</li>
    <li>File Type: <?php echo $type ?></li>
    <li>Created on: <?php echo $date ?></li>
</ul>
    <a href="./display.php?delete=<?php echo $fileName ?>" class = "btn btn-default btn-sm">Delete</a>
</div>
<div class="container">
<?php if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'): ?>
    <img class="img-fluid" src="<?php echo $file ?>" />
<?php elseif ($type == 'text/plain'): ?>
    <textarea class="form-control" rows="20"> <?php echo $finfo->fread($size) ?></textarea>
<?php elseif ($type == 'text/html' || $type == 'application/pdf'): ?>
    <object width=900px height=700px data="<?php echo $file ?>"></object>
<?php else: ?>
    <a href="<?php echo $file ?>"> Download file</a>
<?php endif; ?>
</div>
