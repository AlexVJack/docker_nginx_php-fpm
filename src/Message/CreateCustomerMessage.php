<?php

namespace App\Message;

class CreateCustomerMessage
{
    private $customerId;

    public function __construct(int $customerId)
    {
        $this->customerId = $customerId;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }
}
