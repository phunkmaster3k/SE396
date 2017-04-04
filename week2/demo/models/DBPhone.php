<?php

/**
 * Description of DBSpring
 *
 * @author GFORTI
 */
class DBPhone extends DB {
    //put your code here
    
    function __construct() {
        parent::__construct('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017','root','');

    }
    
    function getAllPhones() {

        $stmt = $this->getDb()->prepare("SELECT * FROM phone");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
    }

}
