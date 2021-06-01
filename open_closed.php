<?php

interface PayableInterface
{
    public function pay();
}

class CreditCardPayment implements PayableInterface
{
    public function pay()
    {
        // execute credit card payment logic
    }
}

class PaypalPayment implements PayableInterface
{
    public function pay()
    {
        // execute PayPal payment logic
    }
}

class ATMTransferPayment implements PayableInterface
{
    public function pay()
    {
        // execute ATM transfer payment logic
    }
}

class PaymentFactory
{
    public function initializePayment($type)
    {
        if ($type === 'credit') {
            return new CreditCardPayment();
        }
        if ($type == 'paypal') {
            return new PaypalPayment();
        }
        if ($type === 'atm') {
            return new ATMTransferPayment();
        }

        throw new Exception("Unsupported payment method");
    }
}

## Controller
public function pay(Request $request)
{
    $paymentFactory = new PaymentFactory();
    $payment = $paymentFactory->initializePayment($request->type);
    $payment->pay();
}


class PaymentManager
{
    public function pay(Request $request)
    {
        $payment = new Payment;

        if ($type === 'credit') {
            // prepare credit card Details
            // for processing
            $payment->payWithCreditCard();
        }
        if ($type === 'paypal') {
            // prepare paypal details
            // for processing
            $payment->payWithPaypal();
        }
    }
}

class Payment
{
    public function payWithCreditCard() 
    {
        // logic for paying with credit card
    }

    public function payWithPaypal()
    {
        // logit for paying with paypal
    }
}