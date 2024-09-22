<?php

require_once 'vendor/autoload.php';

use Handlers\AmountHandler;
use Handlers\CreditCardHandler;
use Handlers\PayPalHandler;

// Crear la cadena de manejadores
$amountHandler = new AmountHandler();
$creditCardHandler = new CreditCardHandler();
$payPalHandler = new PayPalHandler();

$amountHandler->setNext($creditCardHandler)->setNext($payPalHandler);

// Procesar el pago
try {
  $amountHandler->handle(0, 'paypal'); // Esto lanzará una excepción
    $amountHandler->handle(100, 'credit_card');
    $amountHandler->handle(50, 'paypal');
} catch (Exception $e) {
    echo $e->getMessage() . 'ERROR COMPLETO: ' . $e;
}
