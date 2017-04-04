<?php

/**
 * Created by PhpStorm.
 * User: Nathan Livernols
 * Date: 4/4/2017
 * Time: 7:20 PM
 */
interface ICRUD
{
    public function create();
    public function read();
    public function readAll();
    public function update();
    public function delete();


}