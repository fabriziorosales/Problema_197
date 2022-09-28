<?php
// const VOCALES = ['a','e','i','o','u','A','E','I','O','U'];
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
// $ini = implode($ini);
// $final = implode(array_reverse($fin));
$final = array_reverse($fin);
$txt1 = array_merge($ini, $final);
$msgDE2 = implode($ini).implode($final);
// echo $ini.$final;
// var_dump($txt1);

// ENCRIPTACION 1 A ORIGINAL
$txtVo = [];
$txtCon = [];
$segF = [];
$msgE1 = str_split($_POST['msgE1']);
// E nul nugad rel aM ahcna...
// var_dump($msgE1);
for ($i=0; $i < count($msgE1) ; $i++) {

    if (in_array(strtolower($msgE1[$i]), VOCALES, false)) {
        array_push($txtVo,$msgE1[$i]);
    }
    while ((in_array(strtolower($msgE1[$i]), VOCALES, false)) == false) {
        array_push($txtCon, $msgE1[$i]);
        if ($i < count($msgE1)) {
            break;
        }
        $i++;
    }
    $segCon = array_reverse($txtCon);
    $segF = array_merge($txtVo, $segCon);
    echo $segF[$i];
    if ($i == 10){
        break;
    }
    // var_dump($txtCon);
    // break;

    // if (in_array(strtolower($msgE1[$i]), VOCALES, false)) {
    //     // $txtVo .= $msgE1[$i].$txtCon;
        
    // } else {
    //     // echo $i;
    //     $txtCon = $msgE1[$i];
    //     echo $txtCon;
    // }
}

// var_dump($segF);
// echo $txtVo;

// En un lugar de la Mancha...