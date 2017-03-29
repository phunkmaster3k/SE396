<?php


/**
 * Function to return data from database
 *
 * @return array
 */
function readAllAddress() {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $results;
}

/**
 * Function to add address to database
 * @param $fullname
 * @param $email
 * @param $addressline1
 * @param $city
 * @param $state
 * @param $zip
 * @param $birthday
 * @return bool
 */
function createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday");

    $binds = array(
        ":fullname" => $fullname,
        ":email" => $email,
        ":addressline1" => $addressline1,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
        ":birthday" => $birthday,

    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }

    return false;
}

?>
