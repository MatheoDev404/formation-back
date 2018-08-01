<?php
require_once 'Volume.php';

class Sphere implements Volume
{
    public function getForme(): string
    {
        return 'sphère';
    }

}
