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
require_once './models/dbconnect.php';
require_once './models/util.php';
require_once './models/addressCRUD.php';
require_once './models/validation.php';


$fullname = filter_input(INPUT_POST, 'fullname');
$email = filter_input(INPUT_POST, 'email');
$addressline1 = filter_input(INPUT_POST, 'addressline1');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$birthday = filter_input(INPUT_POST, 'birthday');

$errors = [];
$states = getStates();

if (isPostRequest()) {
    if ( empty($fullname)) {
        $errors[] = 'Fullname is Required.';
    }

    if ( empty($addressline1)) {
        $errors[] = 'Address is Required';
    }

    if ( empty($state)) {
        $errors[] = 'State is Required';
    }

    if ( empty($city)) {
        $errors[] = 'City is Required';
    }

    if ( !isZipValid($zip)) {
        $errors[] = 'Invalid Zip';
    }

    if ( !isEmailValid($email)) {
        $errors[] = 'Invalid Email';
    }

    if ( !isDateValid($birthday)) {
        $errors[] = 'Invalid birthday';
    }

    if ( count($errors) === 0 ) {
        if ( createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)) {
            $message = 'Address Added';
            $fullname = '';
            $email = '';
            $addressline1 = '';
            $city = '';
            $state = '';
            $zip = '';
            $birthday = '';
        }
        else {
            $errors[] = 'Could not add to DB';
        }
    }
}

include './templates/header-links.php';
include './templates/add-address.html.php';
include './templates/errors.html.php';
include './templates/messages.html.php';

?>
</body>
</html>