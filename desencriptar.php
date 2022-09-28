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

// ENCRIPTACION 1 A ORIGINAL

$txtCon = [];
$inicio = [];
if (empty($_POST['msgE1'])) {
    $msgE1 = str_split($msgDE2);
} else {
    $msgE1 = str_split($_POST['msgE1']);
}
// E nul nugad rel aM ahcna...
$j = 0;



for ($i=0; $i < count($msgE1) ; $i++) {

    if ($i == 0){
        if (in_array(strtolower($msgE1[$i]), VOCALES)) {
            // array_push($txtVo, $msgE1[$i]);
            array_push($inicio, $msgE1[$i]);
        } else {
            array_push($inicio, $msgE1[$i]);
        }

    } else {

        if (in_array(strtolower($msgE1[$i]), VOCALES) != false) {
            array_push($inicio, $msgE1[$i]);
            array_push($txtVo, $msgE1[$i]);
        } else {

            while (in_array(strtolower($msgE1[$i]), VOCALES) == false) {
                array_push($txtCon, $msgE1[$i]);
                $i++;
                if ($i >= count($msgE1)) {
                    break;
                }
            }
            $txtCon = array_reverse($txtCon);
            $inicio = array_merge($inicio, $txtCon);
            array_push($inicio, $msgE1[$i]);
            $txtCon = [];
            
        }
    }

}
$msgDE1 = implode($inicio);