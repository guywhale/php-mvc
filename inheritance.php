<?php

namespace Hwale;

class User
{
    protected $name = 'Guy';
    protected $age = '40';

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}

class Customer extends User
{
    protected $balance;

    public function __construct($name, $age, $balance)
    {
        parent::__construct($name, $age);
        $this->balance = $balance;
    }

    public function pay($amount)
    {
        return $this->name . ' paid $' . $amount;
    }
}

$customer1 = new Customer('John', '23', 500);

echo $customer1->__get('balance');
