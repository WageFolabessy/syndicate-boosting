<?php

namespace Tests\Stubs;

class MidtransNotificationStub
{
    public $order_id;

    public $transaction_id;

    public $transaction_status;

    public $fraud_status;

    public function __construct()
    {
        // Read from $_POST or request
        $this->order_id = $_POST['order_id'] ?? null;
        $this->transaction_id = $_POST['transaction_id'] ?? null;
        $this->transaction_status = $_POST['transaction_status'] ?? null;
        $this->fraud_status = $_POST['fraud_status'] ?? null;
    }
}
