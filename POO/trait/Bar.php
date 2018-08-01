<?php

class Bar
{
    use Dumper;

    public function dumpParam($param)
    {
        $this->dump($param);
    }
}