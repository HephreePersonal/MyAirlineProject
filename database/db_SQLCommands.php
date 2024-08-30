<?php
function ListAirlines($table,$columns)
{
    $sql = "SELECT $columns FROM $table;";
    return $sql;
}


