<?php

/**
 * Created by PhpStorm.
 * User: Nathan Livernols
 * Date: 4/4/2017
 * Time: 7:07 PM
 */
class Message implements IMessage
{
    protected $messages = [];


    public function addMessage($key, $msg)
    {
        $this->messages[$key] = $msg;
    }

    public function removeMessage($key)
    {
        if ( array_key_exists($key, $this->messages)) {
            unset($this->messages[$key]);
        }
    }

    public function getAllMessages()
    {
        return $this->messages;
    }

}