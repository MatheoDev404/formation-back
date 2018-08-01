<?php
require_once 'Chat.php';

// une classe déclarée final ne peut pas être héritée
final class Siamois extends Chat
{
    /* Fatal error : la méthode ronronner est déclarée final
     * dans chat et ne peut pas être surchargée
    public function ronronner()
    {
        echo 'Ronron ronron';
    }
     * 
     */
}
