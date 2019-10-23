<?php

class Order {
//    /**
//     * @var int $amount
//     */
//    public $amount = 0;
//
//    /**
//     * @var PaymentGateway $gateway
//     */
//    protected $gateway;
//
//    /**
//     * Order constructor.
//     * @param PaymentGateway $gateway
//     */
//    public function __construct(PaymentGateway $gateway)
//    {
//        $this->gateway = $gateway;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function process()
//    {
//        return $this->gateway->charge($this->amount);
//    }

    /**
     * @var int $quantity
     */
    public $quantity;

    /**
     * @var float $unitPrice
     */
    public $unitPrice;

    /**
     * @var float $amount
     */
    public $amount;

    /**
     * Order constructor.
     * @param int $quantity
     * @param float $unitPrice
     */
    public function __construct(int $quantity, float $unitPrice)
    {
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;

        $this->amount = $quantity * $unitPrice;
    }

    /**
     * @param PaymentGateway $gateway
     */
    public function process(PaymentGateway $gateway)
    {
        $gateway->charge($this->amount);
    }
}