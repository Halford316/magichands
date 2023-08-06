<?php

use Illuminate\Support\Carbon;

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

function formatDatetime($inputDate)
{
    // Convertir la cadena en un objeto DateTime usando Carbon
    $dateTime = Carbon::createFromFormat('d-m-Y H:i', $inputDate);

    // Formatear la fecha y hora en el formato deseado (yyyy-mm-dd H:i:s)
    $formattedDateTime = $dateTime->format('Y-m-d H:i:s');

    return $formattedDateTime;
}

?>
