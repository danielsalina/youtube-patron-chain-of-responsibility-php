<?php

class PaymentProcessor {
    public function processPayment($amount, $method) {
        if ($amount <= 0) {
            throw new Exception("El monto debe ser mayor que 0.");
        }

        if ($method == 'credit_card') {
            $this->processCreditCard($amount);
        } elseif ($method == 'paypal') {
            $this->processPayPal($amount);
        } else {
            throw new Exception("Método de pago no soportado.");
        }

        echo "Pago procesado correctamente.\n";
    }

    private function processCreditCard($amount) {
        echo "Pagando $$amount con tarjeta de crédito.\n";
    }

    private function processPayPal($amount) {
        echo "Pagando $$amount con PayPal.\n";
    }
}

$paymentProcessor = new PaymentProcessor();
$paymentProcessor->processPayment(0, 'paypal');