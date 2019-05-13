<?php
//Name: Alicia Buehner
//Date: 05.13.19
//Description: This file contains the midterm validation functions


/**
 * This function checks if the midterm form is valid.
 *
 * @return boolean is valid
 */
function validForm() {
    global $f3;
    $isValid = true;

    if (!validName($f3->get('name'))) {
        $isValid = false;
        $f3->set("errors['name']", 'Please enter your name');
    }

    if (!validAnswers($f3->get('answers'))) {
        $isValid = false;
        $f3->set("errors['answers']", "Please choose at least 1 valid selection");
    }

    return $isValid;
}

/**
 * This function validates a string name input.
 *
 * @param String $name to validate
 * @return boolean is valid
 */
function validName($name) {
    return !empty($name) && ctype_alpha($name);
}

/**
 * This function validates that checkboxes values are valid
 * and not empty.
 *
 * @param array $answers Checkbox options selected
 * @return boolean is valid
 */
function validAnswers($answers) {
    global $f3;
    $isValid = false;
    if (!empty($answers)) {
        foreach ($answers as $item) {
            if (in_array($item, $f3->get('answers'))) {
                $isValid = true;
            }
        }
    }
    return $isValid;
}