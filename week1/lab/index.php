<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<a href="index.php">Home</a>
<a href="add-Index.php">Add</a>
<?php

include './models/dbconnect.php';
include './models/addressCRUD.php';

$addresses = readAllAddress();

include './templates/view-address.html.php';

?>
</body>
</html>