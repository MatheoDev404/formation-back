<?php
class Config
{
    // constante de classe
    const RACINE_WEB = '/php/boutique';
    
    public function getPath($file)
    {
        // $this fait référence à l'objet instancié
        // self fait référence à la classe elle-même
        return self::RACINE_WEB . '/' . $file;
    }
}
