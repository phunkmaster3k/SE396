<?php
/**
 * A method to validate a zip code.
 *
 * @param $Zip
 * @return bool
 */

function isZipValid($Zip) {
    $zipRegEx = '/^[0-9]{5}$/';

    if ( preg_match($zipRegEx, $Zip)) {
        return true;
    }
    return false;
}

/**
 * A method to validate a date.
 *
 * @param $date
 * @return bool
 */

function isDateValid($date) {
    return (bool)strtotime($date);
}

/**
 * A method to validate an email.
 *
 * @param $email
 * @return bool
 */

function isEmailValid($email) {
   return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>