<?php

class something {
    private $q = 15; 
    public static function a( array $as ) { 
        $r = 20 + $this->q; 
        for (int $i = 0; $i < 10; $i++) { 
            $r += $this->q;
        }
    }
}
