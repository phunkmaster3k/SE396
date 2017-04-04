<?php

/**
 * Created by PhpStorm.
 * User: Nathan Livernols
 * Date: 4/4/2017
 * Time: 7:00 PM
 */
interface IMessage
{
    public function addMessage($key, $msg);
    public function removeMessage($key);
    public function getAllMessages();
}

