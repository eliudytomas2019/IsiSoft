<?php

    $number = 1999000;

    $f = new NumberFormatter("pt_BR", NumberFormatter::SPELLOUT);
    $word = $f->format($number);
    echo "Número: " . $number . ", Palavra: " . $word;


?>
