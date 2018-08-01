<?php
require_once 'Cube.php';
require_once 'Texture.php';

// on peut à la fois hériter d'une classe
// et implémenter une ou plusieurs interfaces
class De extends Cube implements Texture
{
    public function getCouleur(): string
    {
        return 'blanc';
    }

    public function getMatiere(): string
    {
        return 'plastique';
    }

}
