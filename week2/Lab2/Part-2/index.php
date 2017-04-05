<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
<?php

include './autoload.php';

$crud = new CRUD();

$addresses = $crud->readAllAddress();

include './templates/header-links.php';
include './templates/view-address.html.php';

?>
</body>
</html>