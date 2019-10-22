<?php

class Order {
    /**
     * @var int $amount
     */
    public $amount = 0;

    /**
     * @var PaymentGateway $gateway
     */
    protected $gateway;

    /**
     * Order constructor.
     * @param PaymentGateway $gateway
     */
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return mixed
     */
    public function process()
    {
        return $this->gateway->charge($this->amount);
    }

}