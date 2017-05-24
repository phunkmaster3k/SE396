<?php

/**
 * Created by PhpStorm.
 * User: Nathan Livernols
 * Date: 4/11/2017
 * Time: 7:55 PM
 */
class Accounts extends DBSpring

{


    /**
     * Accounts constructor.
     */

    /**
     * Adds user to DB
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function signup($email, $password) {
        $db = $this->getDB();
        $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = NOW()");
        $binds = array(
            ":email" => $email,
            ":password" => password_hash($password, PASSWORD_DEFAULT)
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    /**
     * Checks users login
     *
     * @param $email
     * @param $password
     * @return mixed
     */
    public function login($email, $password){
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $binds = array(
            ":email" => $email
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $results['password'])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Gets user email based on ID
     *
     * @param $user_id
     * @return mixed
     */
    public function getEmail($user_id) {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $binds = array(
            ":user_id" => $user_id
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results['email'];
        }
    }

    /**
     * check for unique email
     *
     * @param $email
     * @return bool
     */
    public function uniqueEmail($email){
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $binds = array(
            ":email" => $email
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return false;
        }
    }


}