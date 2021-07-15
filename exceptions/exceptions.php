<?php

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