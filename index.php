<?php

require_once('vendor/autoload.php');

$f3 = \Base::instance();

$f3->set('DEBUG', 3);

$db = new \DB\SQL('mysql:host=localhost;port=3306;dbname=f3loginDB', 'root', '');

// $f3->set('SESSION', true);

// $f3->set('error', '');
$f3->set('year', '2024');


$f3->set('header', \Template::instance()->render('app/views/header.html'));
$f3->set('footer', \Template::instance()->render('app/views/footer.html'));


$f3->set('AUTOLOAD', 'app/');
$f3->route('GET /', function() {
    echo 'Welcome to the Fat-Free Framework!';
});

$f3->route('GET|POST /login', 'Controllers\UserController->login');

$f3->route('GET|POST /signup', 'Controllers\UserController->signup');

$f3->route('GET /dashboard', 'Controllers\UserController->dashboard');

$f3->route('GET /logout', 'Controllers\UserController->logout');

$f3->route('GET /dd', 'Controllers\UserController->dd');

$f3->run();
