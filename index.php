<?php
//Name: Alicia Buehner
//Date: 05.13.19
//Description: This file contains the midterm index page

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require vendor/autoload file
require_once('vendor/autoload.php');
require_once('model/validation-functions.php');

//Create an instance of the Base class (instantiate Fat-Free)
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define checkbox array
$f3->set('questions', array('This midterm is easy', 'I like midterms', 'Today is Monday'));

//Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view-> render('views/default_route.html');
});

//Define a default route
$f3->route('GET|POST /survey', function($f3) {
    $view = new Template();
    echo $view-> render('views/survey_form.html');
});

//Run Fat-free
$f3->run();