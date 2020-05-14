<?php


namespace App\Models;


class User
{
    private $firstname;
    private $surname;
    private $emailAddress;
    public function setFirstName($firstname)
    {
        $this->firstname = trim($firstname);
    }
    public  function getFirstName()
    {
        return $this->firstname;
    }
    public function setSurName($surname)
    {
        $this->surname = trim($surname);
    }
    public  function getSurName()
    {
        return $this->surname;
    }

    public function getFullName()
    {
        return $this->getFirstName() .' '. $this->getSurName();
    }

    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function getEmailVariables()
    {
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmailAddress()
        ];
    }

}