<?php

// Throw an exception
/*
try {
    processCreditCard();
} catch (Exception $e) {
    echo $e->getMessage();
}
function processCreditCard($numb = null, $zipCode = null) {
    if (is_null($numb)) {
        throw new Exception('No credit card number');
    }
    echo 'proccessed';
}
*/

// Nested exception
try {
    processCreditCard();
} catch (Exception $e) {
    echo $e->getMessage();
    echo get_class($e);
    echo "\n";
    echo $e->getPrevious()->getMessage();
    echo get_class($e->getPrevious());
    echo "\n";
}
function processCreditCard($numb = null, $zipCode = null) {
    try {
        validate($numb, $zipCode);
    } catch (Exception $e) {
        throw new BadFunctionCallException('Invalid Inputs', null, $e);
    }
    echo 'proccessed';
}
function validate($numb, $zipCode) {
    if (is_null($numb)) {
        throw new InvalidArgumentException('No credit card number');
    }
}