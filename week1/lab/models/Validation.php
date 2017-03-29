<?php

function isZipValid($Zip) {
    $zipRegEx = '/^[0-9]{5}$/';

    if ( preg_match($zipRegEx, $Zip)) {
        return true;
    }
    return false;
}

function isDateValid($date) {
    return (bool)strtotime($date);
}

function isEmailValid($email) {
   return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>