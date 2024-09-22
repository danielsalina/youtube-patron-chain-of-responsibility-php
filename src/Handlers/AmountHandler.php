<?php

namespace Handlers;

class AmountHandler implements PaymentHandler {
    private $nextHandler;

    public function setNext(PaymentHandler $handler): PaymentHandler {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(float $amount, string $method): void {
        if ($amount <= 0) {
            throw new \Exception("El monto debe ser mayor que 0.\n");
        }

        if ($this->nextHandler) {
            $this->nextHandler->handle($amount, $method);
        }
    }
}
