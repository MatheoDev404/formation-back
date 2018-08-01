<?php
require_once 'Volume.php';

class Cube implements Volume
{
    public function getForme(): string
    {
        return 'cube';
    }
}
