<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require_once './autoload.php';

$testError = new ErrorMessage();

$testError->addMessage('test1', 'testing error 1');
$testError->addMessage('test2', 'testing error 2');
$testError->addMessage('test3', 'testing error 3');

$testError->removeMessage('test1');
var_dump('<br />', $testError->getAllMessages());

$testMessage = new Message();

$testMessage->addMessage('test1', 'testing message 1');
$testMessage->addMessage('test2', 'testing message 2');
$testMessage->addMessage('test3', 'testing message 3');

$testMessage->removeMessage('test2');
var_dump('<br />', $testMessage->getAllMessages());

$testSuccess = new Message();

$testSuccess->addMessage('test1', 'testing success 1');
$testSuccess->addMessage('test2', 'testing success 2');
$testSuccess->addMessage('test3', 'testing success 3');

$testMessage->removeMessage('test3');
var_dump('<br />', $testSuccess->getAllMessages());

?>
</body>
</html>
