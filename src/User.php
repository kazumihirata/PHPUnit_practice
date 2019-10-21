<?php

class User
{
    /**
     * @var string $firstName
     */
    public $firstName;

    /**
     * @var string $lastName
     */
    public $lastName;

    /**
     * @return string FullName
     */
    public function getFullName()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }


}