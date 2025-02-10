<?php

// This class represents the orders entity and encapsulates its key attributes and associated order items.

class Order
{
    // Order entity attributes
    public $id;
    public $creationDate;
    public $name;
    public $amount;
    public $currency;
    public $status;
    public $items = [];

    // Constructor method
    public function __construct($id, $creationDate, $name, $amount, $currency, $status)
    {
        $this->id = $id;
        $this->creationDate = $creationDate;
        $this->name = $name;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->status = $status;
    }

    // Function to add items to the order, creating and mapping the existing 1:n relationship
    public function addItem(OrderItem $item)
    {
        $this->items[] = $item;
    }
}
