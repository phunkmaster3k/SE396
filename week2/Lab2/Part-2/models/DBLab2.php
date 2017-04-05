<?php

/**
 * Created by PhpStorm.
 * User: Nathan Livernols
 * Date: 4/4/2017
 * Time: 7:58 PM
 */
class DBLab2
{
    protected $db = null;
    protected $dns;
    protected $user;
    protected $password;

    /**
     * DBLab2 constructor.
     *
     */
    function __construct() {
        $this->dns = 'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017';
        $this->user = 'root';
        $this->password = '';
    }


    /**
     * connection function
     *
     * @return null|PDO
     * @throws Exception
     */
    function dbconnect()
    {
        /*
         * If the DB is not null a connection has been made.
         */
        if ( null != $this->db ) {
            return $this->db;
        }

        try {
            /* Create a Database connection and
             * save it into the variable */
            $this->db = new PDO($this->dns, $this->user, $this->password);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {
            /* If the connection fails we will close the
             * connection by setting the variable to null */
            $this->closeDB();
            throw new Exception($ex->getMessage());

        }

        return $this->db;
    }

    protected function closeDB() {
        $this->db = null;
    }
}