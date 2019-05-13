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

session_start();

//Create an instance of the Base class (instantiate Fat-Free)
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define checkbox array
$f3->set('answers', array('This midterm is easy', 'I like midterms', 'Today is Monday'));

//Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view-> render('views/default_route.html');
});

//Define a route to survey
$f3->route('GET|POST /survey', function($f3) {

    if (!empty($_POST)) {
        $name = $_POST['name'];
        $ans = $_POST['answers'];

        //get data from form
        $f3->set('name', $name);
        $f3->set('answers', $ans);

        if (validForm()) {
            $_SESSION['name'] = $name;
            $_SESSION['answers'] = $ans;

            //Redirect to Summary
            $f3->reroute('/summary');
        }
    }
    $view = new Template();
    echo $view-> render('views/survey_form.html');
});

//Define a summary route
$f3->route('GET|POST /summary', function() {

    //Display summary
    $view = new Template();
    echo $view->render('views/summary_form.html');
});

//Run Fat-free
$f3->run();