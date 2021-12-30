<?php
class student
{
    private $name;
    private $id;
    private $age;
    private $address;
    private $gender;
    function __construct()
    {
    }
    //getter
    function getName()
    {
        return $this->name;
    }
    function getId()
    {
        return $this->id;
    }
    function getAge()
    {
        return $this->age;
    }
    function getAddress()
    {
        return $this->address;
    }
    function getGender()
    {
        return $this->gender;
    }
    //setter
    function setName($name)
    {
        $this->name = $name;
    }
    function setId($Id)
    {
        $this->id = $Id;
    }
    function setAge($Age)
    {
        $this->age = $Age;
    }
    function setAddress($Address)
    {
        $this->address = $Address;
    }
    function setGender($Gender)
    {
        $this->gender = $Gender;
    }
}
