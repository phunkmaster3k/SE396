<?php

/**
 * Created by PhpStorm.
 * User: Nathan Livernols
 * Date: 4/4/2017
 * Time: 8:02 PM
 */
class Valid
{
    /**
     * A method to validate a zip code.
     *
     * @return boolean
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
     * @return boolean
     */

    function isDateValid($date) {
        return (bool)strtotime($date);
    }

    /**
     * A method to validate an email.
     *
     * @return boolean
     */

    function isEmailValid($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}