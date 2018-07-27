<?php

class Config
{
    const RACINE_WEB = '/php/boutique';

    public function getPath($file) 
    {
        // self fait reference à la class elle-même
        return self::RACINE_WEB . '/' . $file;
    }



}