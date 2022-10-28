<?php

namespace User;

//Define a class
class User
{
    private $name;
    private $age;

    public function __construct(string $name, string $age)
    {
        echo 'Class ' . __CLASS__ . ' instantiated<br>';
        $this->name = $name;
        $this->age = $age;
    }

    //__get MAGIC METHOD
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    //__set MAGIC METHOD
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}

// Instantiate a user object from the user class
$user1 = new User('Guy', '40');
//__get
echo $user1->__get('name'), '<br>';
echo $user1->__get('age'), '<br>';
//__set
$user1->__set('name', 'Gandalf');
$user1->__set('age', '2000');
echo $user1->__get('name'), '<br>';
echo $user1->__get('age'), '<br>';
