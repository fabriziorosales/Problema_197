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

// Invertimos los valores para que se pongan 
$fin = array_reverse($fin);

// Transformamos y fusionamos los dos arrays en un unico string
$msgDE2 = implode($ini).implode($fin);

// ENCRIPTACION 1 A ORIGINAL (x' -> x)
// Inicializamos dos arrays
$fin = [];
$ini = [];

// Verificamos si el input de msgE1 (x') esta vacia
if ($_POST['msgE1'] != implode($ini).implode($fin)) {
    $msgE1 = str_split($msgDE2);
} else {
    $msgE1 = str_split($_POST['msgE1']);
}

// Recorremos el string msgE1 (x')
for ($i=0; $i < count($msgE1) ; $i++) {

    // Comprobamos si el caracter es una vocal o no
    if (in_array(strtolower($msgE1[$i]), VOCALES) != false) {
        array_push($ini, $msgE1[$i]);
    } else {

        // Recorremos el array msgE1 (x') hasta encontrar una vocal, si lo encuentra no lo almacenando
        while (in_array(strtolower($msgE1[$i]), VOCALES) == false) {
            array_push($fin, $msgE1[$i]);
            $i++;

            // En el caso de que no encuentre una vocal al final del array, se sale del while.
            if ($i >= count($msgE1)) {
                break;
            }

        }

        // Invertimos los caracteres especulares para que se posicionen correctamente.
        $fin = array_reverse($fin);
        
        // Fusionamos los dos arrays en un unico
        $ini = array_merge($ini, $fin);

        // Metemos en el array la vocal faltante
        array_push($ini, $msgE1[$i]);

        // Limpiamos el array para la siguiente cadena de texto
        $fin = [];
        
    }

}

// Transformamos el array en un string
$msgDE1 = implode($ini);