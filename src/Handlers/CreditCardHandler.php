<?php

namespace Handlers;

class CreditCardHandler implements PaymentHandler {
    private $nextHandler;

    public function setNext(PaymentHandler $handler): PaymentHandler {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(float $amount, string $method): void {
        if ($method === 'credit_card') {
            echo "Pagando $amount con tarjeta de crédito.\n";
        } elseif ($this->nextHandler) {
            $this->nextHandler->handle($amount, $method);
        } else {
            throw new \Exception("Método de pago no soportado.");
        }
    }
}
