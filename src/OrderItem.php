<?php

// This class represents the orders item entity and encapsulates its key attributes.

class OrderItem
{
    // Order item entity attributes
    public $name;
    public $amount;

    // Constructor method
    public function __construct($name, $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }
}
