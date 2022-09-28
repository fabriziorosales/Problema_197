<?php
// DESENCRIPTAR 2 A 1
const VOCALES = ['a','e','i','o','u'];
$msgE2 = str_split($_POST['msgE2']);

// "E. .n.ualn cnhuag aMda  rle"
$fin = [];
$ini = [];

for ($i=0; $i < count($msgE2) ; $i++) {
    if ($i % 2 == 0) {
        array_push($ini, $msgE2[$i]);
    } else {
        array_push($fin, $msgE2[$i]);
    }
}

$final = array_reverse($fin);

$txt1 = array_merge($ini, $final);
$msgDE2 = implode($ini).implode($final);

// En un lugar de la Mancha...