<div class="container">
    <h1>Add Address</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="fullname">Fullname:</label><br />
            <input name="fullname" class="form-control" id="fullname" value="<?php echo $fullname; ?>" />
        </div>
        <div class="form-group">
            <label for="email">Email:</label><br />
            <input name="email" class="form-control" id="email" value="<?php echo $email; ?>" />
        </div>
        <div class="form-group">
            <label for="addressline1">Addressline1</label><br />
            <input name="addressline1" class="form-control" id="addressline1" value="<?php echo $addressline1; ?>" />
        </div>
        <div class="form-group">
            <label for="city">City</label><br />
            <input name="city" class="form-control" id="city" value="<?php echo $city; ?>" />
        </div>
        <label for="state">State</label>
        <select class="form-control" id="state" name="state">
            <?php foreach ($states as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if ( $state == $key ): ?> selected="selected" <?php endif; ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
        </select><br />
        <div class="form-group">
            <label for="zip">Zip</label><br />
            <input name="zip" class="form-control" id="zip" value="<?php echo $zip; ?>" />
        </div>
        <div class="form-group">
            <label for="date">Date</label><br />
            <input type="date" class="form-control" id="date" name="birthday" value="<?php echo $birthday; ?>" />
        </div>

        <input type="submit" value="submit" class="btn btn-primary" />
    </form><br />
</div>
