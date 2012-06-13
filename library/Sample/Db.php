<?php
class Sample_Db
{
    private $name;
    private $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }
}