<?php
trait Dumper
{
    public function dump($svar)
    {
        echo '<pre>';
        var_dump($var);
        echo '<pre>';
    }
}