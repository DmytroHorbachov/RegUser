<?php

$fileExists = '/err.log';

if (!file_exists($fileExists)) {
    file_get_contents('err.log');
}

$users = array(
    ['id' => 1,
        'name' => 'Dima',
        'email' => 'dima@i.ua'],
    ['id' => 2,
        'name' => 'Masha>',
        'email' => 'mash@i.ua'],
    ['id' => 3,
        'name' => 'Sasha',
        'email' => 'sas@i.ua'],
    ['id' => 4,
        'name' => 'Serg',
        'email' => 'ser@i.ua']
);

$name = trim($_POST['name']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$passwordAgain = trim($_POST['passwordAgain']);
$timeForLogs = date('H:i:s');

$error = '';

foreach ($users as $allUsers) {
    if ($email == $allUsers['email']) {
        $error .= 'Email is in use';
        break;
    }
}
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $error .= 'Email is not correct';
}

if ($password != $passwordAgain) {
    $error .= 'Passwords do not match';
}


if ($error != '') {
    echo $error;
    error_log("[" . $timeForLogs . "] " . $error . "\n", 3, 'err.log');
    exit();
}


echo 'Done';
