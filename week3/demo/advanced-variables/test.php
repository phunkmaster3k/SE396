<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
// put your code here


class Dog
{

    public function __construct($name)
    {
        $this->name = $name;
    }

    public $name;

    public function bark()
    {
        echo "$this->$name is barking";
    }
}

$pet = 'Dog';
$action = 'bark';
$dog = new $pet('Gabe');

$dog->$action();










?>
</body>
</html>
