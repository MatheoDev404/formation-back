<?php
class Testeur
{
    public function accepteDix($nb)
    {
        if ($nb != 10) {
            throw new Exception('10 expected, ' . $nb . ' given');
        }
        
        echo 'ok';
    }
    
    public function raleSiNonDix($nb)
    {
        try {
            $this->accepteDix($nb);
        } catch (Exception $e) {
            echo "Je râle parce que je n'ai pas reçu dix";
        }
    }
}
