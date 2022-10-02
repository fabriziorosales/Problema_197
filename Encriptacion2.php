<?php

// ENCRIPTACION 2 A 1 (x'' -> x')
// Inicializamos un array con las vocales
const VOCALES = ['a','e','i','o','u'];

// Transformamos el mensaje encriptado a un array
$msgE2 = str_split($_POST['msgE2']);

// Inicializamos dos arrays vacios para guardar los caracteres pares e impares
$fin = [];
$ini = [];

// Recorremos el array y vamos almacenando los valores invertidos secuencialmente
for ($i=0; $i < count($msgE2) ; $i++) {
    if ($i % 2 == 0) {
        array_push($ini, $msgE2[$i]);
    } else {
        array_push($fin, $msgE2[$i]);
    }
}

// Invertimos los valores
$fin = array_reverse($fin);

// Transformamos y fusionamos los dos arrays en un unico string
$msgDE2 = implode($ini).implode($fin);