<?php

class MaitreChien {

    /**
     * @var Chien
     */
    private $chien;

    public function getChien(): Chien {
        return $this->chien;
    }
    
    public function setChien(Chien $chien) {
        $this->chien = $chien;
        return $this;
    }
}