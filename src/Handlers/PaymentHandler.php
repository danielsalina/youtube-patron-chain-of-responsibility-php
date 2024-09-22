<?php

namespace Handlers;

interface PaymentHandler {
    public function setNext(PaymentHandler $handler): PaymentHandler;
    public function handle(float $amount, string $method): void;
}
