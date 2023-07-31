<?php

function getSexos()
{
    $array = array(
        'M' => 'Masculino',
        'F' => 'Femenino'
    );

    return $array;
}

function getEstadoCivil()
{
    $array = array(
        'S' => 'Soltero',
        'C' => 'Casado',
        'V' => 'Viudo',
        'D' => 'Divorciado'
    );

    return $array;
}

function getStatusClass()
{
    $array = array(
        'pendiente' => 'danger',
        'iniciada' => 'success',
        'concluida' => 'secondary'
    );

    return $array;
}

?>
