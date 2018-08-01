<?php

trait Displayer
{
    public function display($var, $color = 'black')
    {
        echo '<p style="color: ' . $color . '">' . $var . '</p>';
    }
}