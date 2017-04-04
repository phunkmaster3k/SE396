<?php if ( isset($errors) && is_array($errors) ) : ?>
    <div class="container">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="bg-danger"><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>