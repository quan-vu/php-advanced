<?php

class InvalidCreditCardNumber extends InvalidArgumentException {
    public function __construct($message = 'No Credit Card Number', $code = 0, $previous = null) {
        return parent::__construct($message, $code, $previous);
    }
}

try {
    processCreditCard();
} catch (InvalidCreditCardNumber $e) {
    echo $e->getMessage() . ' '.get_class($e);
    echo "\n";
}

function processCreditCard($numb = null, $zipCode = null) {
    try {
        validate($numb, $zipCode);
    } catch (Exception $e) {
        throw $e;
    }
    echo 'proccessed';
}
function validate($numb, $zipCode) {
    if (is_null($numb)) {
        throw new InvalidCreditCardNumber();
    }
}